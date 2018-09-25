<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/19/2018
 * Time: 12:51 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


use App\Http\Controllers\Base\Logic\DailyReportLogic;
use App\Http\Controllers\Base\Logic\InvoiceInfoLogic;
use App\Http\Controllers\Base\Logic\InvoiceItemLogic;
use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\Enum\InvoiceStatusEnum;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoicePaymentLogic
{
    private $expense = 0;
    private $income = 0;

    //Invoice Payment Instance
    public static function Instance(){
        return new InvoicePaymentLogic();
    }

    //Transaction Record
    private function TransactionRecord($invoice_id, $transaction_type, $amount){
        $insertResult = DB::table('invoice_payment_record')
            ->insertGetId([
                'invoice_id' => $invoice_id,
                'transaction_type' => $transaction_type,
                'amount' => $amount,
                'user_id' => Auth::id(),
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
            ]);

        return $insertResult;
    }

    //Interests Payment
    private function InterestsPayment($amount, $invoice_id){
        if ($amount < 0 || $amount == 0) return;

        $oldObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        //Update Invoice Expire Date
        DB::table('invoice_info')
            ->where('id','=',$invoice_id)
            ->update([
                'expired_date' => DateTimeLogic::Instance()
                    ->AddDaysToCurrentDateDBFormat(30, DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        //Save Transaction Record
        $this->TransactionRecord($invoice_id, UserActionEnum::INTERESTS_PAYMENT, $amount);

        //Save User Audit Record
        UserAuditLogic::Instance()->UserInvoiceAction($invoice_id, UserActionEnum::INTERESTS_PAYMENT,
            $oldObj->display_id.'-'.$amount."$",[]);

        //Income
        $this->income += $amount;
    }

    //Grand Cost Payment
    private function GrandCostPayment($amount, $invoice_id){
        if ($amount < 0 || $amount == 0) return;

        $changeLogArray = array();
        //Find
        $oldObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        //Update Invoice Expire Date
        $oldCost = $oldObj->grand_total;
        $paidAmount = $oldObj->paid;
        $remain = $oldCost - ($paidAmount + $amount);
        if ($remain == 0 || $remain < 0){
            //Mean that invoice is full paid
            //Depreciate all items
            InvoiceItemLogic::Instance()->DepreciationItems(InvoiceItemLogic::DEPRECIATION_ALL, null, $invoice_id);

            //Update Invoice Info
            DB::table('invoice_info')
                ->where('id','=', $invoice_id)
                ->update([
                    'status' => InvoiceStatusEnum::CLOSE,
                    'paid' => $paidAmount + $amount
                ]);
        }else{
            //Mean that invoice not full paid
            DB::table('invoice_info')
                ->where('id','=',$invoice_id)
                ->update([
                    'expired_date' => DateTimeLogic::Instance()
                        ->AddDaysToCurrentDateDBFormat(30, DateTimeLogic::DB_DATE_TIME_FORMAT),
                    'paid' => $paidAmount + $amount
                ]);
        }

        //Save Transaction Record
        $this->TransactionRecord($invoice_id, UserActionEnum::GRAND_TOTAL_PAYMENT, $amount);

        //Save User Audit Record
        $changeLogArray = UserAuditLogic::Instance()
            ->CompareField(AuditGroup::GRAND_COST, $oldCost, $amount, UserActionEnum::UPDATE, $changeLogArray);
        UserAuditLogic::Instance()->UserInvoiceAction($invoice_id, UserActionEnum::GRAND_TOTAL_PAYMENT,
            $oldObj->display_id.'-'.$amount."$", $changeLogArray);

        //Income
        $this->income += $amount;
    }

    //Add More Cost
    private function AddMoreCost($amount, $invoice_id){
        if ($amount < 0 || $amount == 0) return;

        $changeLogArray = array();
        //Find
        $oldObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        //Update Invoice Expire Date
        $oldCost = $oldObj->grand_total;
        $newCost = $oldCost + $amount;
        //Update Invoice Info
        DB::table('invoice_info')
            ->where('id','=', $invoice_id)
            ->update([
                'grand_total' => $newCost
            ]);

        //Save Transaction Record
        $this->TransactionRecord($invoice_id, UserActionEnum::ADD_ON_GRAND_TOTAL, $amount);

        //Save User Audit Record
        $changeLogArray = UserAuditLogic::Instance()
            ->CompareField(AuditGroup::GRAND_COST, $oldCost, $newCost, UserActionEnum::UPDATE, $changeLogArray);
        UserAuditLogic::Instance()->UserInvoiceAction($invoice_id, UserActionEnum::ADD_ON_GRAND_TOTAL,
            $oldObj->display_id.'-'.$amount."$", $changeLogArray);

        //Income
        $this->expense += $amount;
    }

    //Item Depreciation
    private function DepreciationItems($items, $invoice_id){
        if ($items == null || empty($items)) return;

        //Check
        $itemsCheck = DB::table('invoice_item')
            ->where('invoice_id','=', $invoice_id)
            ->where('status','=', InvoiceItemStatusEnum::OPEN)
            ->count();

        if ($itemsCheck == 0 || empty($itemsCheck)) return;

        //Depreciate Item
        foreach ($items as $item){
            InvoiceItemLogic::Instance()->DepreciationItems(InvoiceItemLogic::DEPRECIATION_ONE, $item, $invoice_id);
        }
    }

    //Add More Items
    private function AddItemsWhenPayment($items, $invoice_id){
        if ($items == null || empty($items)) return;

        $changeLogArray = array();
        //Add More Item
        foreach ($items as $item){
            InvoiceItemLogic::Instance()->Create($item, $invoice_id);

            //Change Log
            $itemObj = InvoiceItemLogic::Instance()->Find($item);
            $changeLogArray = UserAuditLogic::Instance()
                ->CompareEditItem((object)$itemObj, (object)$itemObj, $changeLogArray, UserActionEnum::Add);
        }

        //User Audit Trail
        //TODO: User Audit Log and Update Daily Report
        //Update Daily Report

    }

    //Invoice Payment Method
    public function InvoicePayment($interests_payment, $cost_payment, $add_cost, $invoice_id){
        //Interests Payment
        $this->InterestsPayment($interests_payment, $invoice_id);

        //Cost Payment
        $this->GrandCostPayment($cost_payment, $invoice_id);

        //Add more cost
        $this->AddMoreCost($add_cost, $invoice_id);

        //Update Daily Report
        DailyReportLogic::Instance()->UpdateCurrentReport(0,0, $this->expense, $this->income);
    }

}