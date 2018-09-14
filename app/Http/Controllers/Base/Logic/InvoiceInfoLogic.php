<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:48 PM
 */

namespace App\Http\Controllers\Base\Logic;

use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\Enum\InvoiceStatusEnum;
use App\Http\Controllers\Base\Model\InvoiceInfoModel;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceInfoLogic
{

    //Instance Method
    public static function Instance(){
        return new InvoiceInfoLogic();
    }

    public function FilterSearch($search, $search_option, $status, $page_size){

    }

    //Get One Invoice
    public function Find($id){
        //Invoice Info Query
        $invoiceResult = DB::table('invoice_info')
            ->select(
                'invoice_info.id','invoice_info.customer_name','invoice_info.customer_phone',
                'invoice_info.created_date_time','invoice_info.expired_date','invoice_info.user_id',
                'users.name','invoice_info.status','invoice_info.grand_total','invoice_info.paid',
                'invoice_info.interests_rate','invoice_info.final_date_time'
            )
            ->join('users','invoice_info.user_id','=','users.id')
            ->where('invoice_info.id','=', $id)->first();

        //Manage Info Model
        $invoiceModel = InvoiceInfoModel::Instance();
        $invoiceModel->id = $invoiceResult->id;
        $invoiceModel->display_id = str_pad(intval($invoiceModel->id),
            7,"0", STR_PAD_LEFT);
        $invoiceModel->customer_name = $invoiceResult->customer_name;
        $invoiceModel->customer_phone = $invoiceResult->customer_phone;
        $invoiceModel->created_date = $invoiceResult->created_date_time;
        $invoiceModel->expire_date = $invoiceResult->expired_date;
        $invoiceModel->user_id = $invoiceResult->user_id;
        $invoiceModel->user_full_name = $invoiceResult->name;
        $invoiceModel->status = $invoiceResult->status;
        $invoiceModel->display_status = InvoiceStatusEnum::STATUS_ARRAY[intval($invoiceModel->status)];
        $invoiceModel->grand_total = $invoiceResult->grand_total;
        $invoiceModel->paid = $invoiceResult->paid;
        $invoiceModel->interests_rate = intval($invoiceResult->interests_rate);
        $invoiceModel->interests_value = ($invoiceResult->grand_total * $invoiceResult->interests_rate) / 100;
        $invoiceModel->final_date_time = $invoiceResult->final_date_time;

        //Get Invoice Items
        $invoiceItems = InvoiceItemLogic::Instance()->GetInvoiceItemsForInvoice($id);

        //Return Class
        $class = new \stdClass();
        $class->invoice_info = $invoiceModel;
        $class->invoice_items = $invoiceItems;

        return $class;
    }

    //Create Invoice
    public function Create($invoice_info_model, array $invoice_item_array){
        $dateInstance = DateTimeLogic::Instance();

        //Insert Invoice
        $insertID = DB::table('invoice_info')
            ->insertGetId([
                'customer_name' => $invoice_info_model->customer_name,
                'customer_phone' => $invoice_info_model->customer_phone,
                'created_date_time' => $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'expired_date' => $dateInstance
                    ->AddDaysToCurrentDateDBFormat(30, DateTimeLogic::DB_DATE_TIME_FORMAT),
                'user_id' => Auth::id(),
                'status' => InvoiceStatusEnum::OPEN,
                'grand_total' => $invoice_info_model->grand_total,
                'interests_rate' => intval($invoice_info_model->interests_rate),
            ]);

        //Update Display ID
        DB::table('invoice_info')->where('id','=', $insertID)
            ->update(['display_id' => str_pad(intval($insertID),7,"0", STR_PAD_LEFT)]);

        //Insert Item
        $i = 0;
        foreach ($invoice_item_array as $item){
            ++$i;
            InvoiceItemLogic::Instance()->Create($item, $i, $insertID);
        }

        //User Audit
        UserAuditLogic::Instance()->UserAddNewInvoice($insertID);

        //Update Report
        DailyReportLogic::Instance()
            ->UpdateCurrentReport(sizeof($invoice_item_array), 0, $invoice_info_model->grand_total, 0);

        //Return Invoice ID
        return $insertID;
    }

    public function Update(InvoiceInfoModel $invoice_info_model, array $modify_item_array, array $insert_new_item_array,
    array $delete_item_array, $invoice_id){


    }

    public function InterestsPaymentTransaction($interests_fee, $id){

    }

    public function CostPaymentTransaction($cost_fee, $id){


    }

    public function AddCostPaymentTransaction($add_on_cost, $id){

    }

    public function TookInvoice($id){


    }

}