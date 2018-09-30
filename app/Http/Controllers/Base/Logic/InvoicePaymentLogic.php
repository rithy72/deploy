<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/19/2018
 * Time: 12:51 PM
 */

namespace App\Http\Controllers\Base\Logic;




use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\Enum\InvoiceStatusEnum;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoicePaymentLogic
{
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
    }

    //Grand Cost Payment
    private function GrandCostPayment($amount, $invoice_id){
        if ($amount < 0 || $amount == 0) return;

        $changeLogArray = array();
        //Find
        $oldObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        //Update Invoice Expire Date
        $paidAmount = $oldObj->paid;
        $remain = $oldObj->remain - $amount;
        if ($remain == 0 || $remain < 0){
            //Mean that invoice is full paid
            //Depreciate all items
            InvoiceItemLogic::Instance()->DepreciationItems(InvoiceItemLogic::DEPRECIATION_ALL, null, $invoice_id);

            //Update Invoice Info
            DB::table('invoice_info')
                ->where('id','=', $invoice_id)
                ->update([
                    'status' => InvoiceStatusEnum::CLOSE,
                    'paid' => $paidAmount + $amount,
                    'remain' => 0,
                    'final_date_time' => DateTimeLogic::Instance()
                        ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                    'final_action_user' => Auth::id()
                ]);
        }else{
            //Mean that invoice not full paid
            DB::table('invoice_info')
                ->where('id','=',$invoice_id)
                ->update([
                    'paid' => $paidAmount + $amount,
                    'remain' => $remain
                ]);
        }

        //Save Transaction Record
        $this->TransactionRecord($invoice_id, UserActionEnum::GRAND_TOTAL_PAYMENT, $amount);

        //Save User Audit Record
        $changeLogArray = UserAuditLogic::Instance()
            ->CompareField(AuditGroup::REMAIN_COST, $oldObj->remain, $remain, UserActionEnum::UPDATE, $changeLogArray);
        UserAuditLogic::Instance()->UserInvoiceAction($invoice_id, UserActionEnum::GRAND_TOTAL_PAYMENT,
            $oldObj->display_id.'-'.$amount."$", $changeLogArray);
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
        //
        $oldRemain = $oldObj->remain;
        $newRemain = $oldRemain + $amount;
        //Update Invoice Info
        DB::table('invoice_info')
            ->where('id','=', $invoice_id)
            ->update([
                'grand_total' => $newCost,
                'remain' => $newRemain
            ]);

        //Save Transaction Record
        $this->TransactionRecord($invoice_id, UserActionEnum::ADD_ON_GRAND_TOTAL, $amount);

        //Change Log
        $changeLogArray = UserAuditLogic::Instance()
            ->CompareField(AuditGroup::GRAND_COST, $oldCost, $newCost, UserActionEnum::UPDATE, $changeLogArray);
        $changeLogArray = UserAuditLogic::Instance()
            ->CompareField(AuditGroup::REMAIN_COST, $oldRemain, $newRemain, UserActionEnum::UPDATE, $changeLogArray);
        //Save User Audit Record
        UserAuditLogic::Instance()->UserInvoiceAction($invoice_id, UserActionEnum::ADD_ON_GRAND_TOTAL,
            $oldObj->display_id.'-'.$amount."$", $changeLogArray);
    }

    //Item Depreciation
    private function DepreciationItems($items, $invoice_id){
        if ($items == null || empty($items)) return;

        $invoiceObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        if ($invoiceObj->status == InvoiceStatusEnum::CLOSE || $invoiceObj->status == InvoiceStatusEnum::TOOK) return;

        //Check
        $itemsCheck = DB::table('invoice_item')
            ->where('invoice_id','=', $invoice_id)
            ->where('status','=', InvoiceItemStatusEnum::OPEN)
            ->count();

        if ($itemsCheck == 0 || empty($itemsCheck)) return;

        //Depreciate Item
        InvoiceItemLogic::Instance()->DepreciationItems(InvoiceItemLogic::DEPRECIATION_ONE, $items, $invoice_id);
    }

    //Add More Items
    private function AddItemsWhenPayment($items, $invoice_id){
        if ($items == null || empty($items)) return;

        $invoiceObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        if ($invoiceObj->status == InvoiceStatusEnum::CLOSE || $invoiceObj->status == InvoiceStatusEnum::TOOK) return;

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
        UserAuditLogic::Instance()
            ->UserInvoiceItemAction($invoice_id, UserActionEnum::Add, $invoiceObj->display_id, $changeLogArray);
        //Update Daily Report
        DailyReportLogic::Instance()->UpdateCurrentReport(intval(sizeof($items)),0,0,0);
    }

    //Invoice Payment Method
    public function InvoicePayment($interests_payment, $cost_payment, $add_cost, $add_items, $depreciate_items, $invoice_id){
        $expense = 0;
        $income = 0;

        $invoiceObj = InvoiceInfoLogic::Instance()->Find($invoice_id);

        //Check if invoice can do any more transaction
        if ($invoiceObj->status == InvoiceStatusEnum::CLOSE || $invoiceObj->status == InvoiceStatusEnum::TOOK) return false;

        //Interests Payment
        $this->InterestsPayment($interests_payment, $invoice_id);
        $income += $interests_payment;

        //Add more cost
        $this->AddMoreCost($add_cost, $invoice_id);
        $expense += $add_cost;

        //Cost Payment
        $this->GrandCostPayment($cost_payment, $invoice_id);
        $income += $cost_payment;

        //Add more Items
        $this->AddItemsWhenPayment($add_items, $invoice_id);

        //Depreciate Items
        $this->DepreciationItems($depreciate_items, $invoice_id);

        //Update Daily Report
        DailyReportLogic::Instance()->UpdateCurrentReport(0,0, $expense, $income);

        return true;
    }

}