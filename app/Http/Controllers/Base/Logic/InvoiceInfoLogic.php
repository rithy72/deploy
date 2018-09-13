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
        $invoiceModel->interests_value = $invoiceResult->grand_total / $invoiceResult->interests_rate;
        $invoiceModel->final_date_time = $invoiceResult->final_date_time;

        //Get Invoice Items
        $invoiceItems = $this->GetInvoiceItems($id);

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

        //Insert Item
        $i = 0;
        foreach ($invoice_item_array as $item){
            ++$i;
            InvoiceItemLogic::Instance()->Create($item, $i, $insertID);
        }

        //User Audit
        UserAuditLogic::Instance()->UserAddNewInvoice($insertID);

        //Return Invoice ID
        return $insertID;
    }

    public function Update(InvoiceInfoModel $invoice_info_model, array $modify_item_array, array $insert_new_item_array,
    array $delete_item_array){


    }

    public function InterestsPaymentTransaction($interests_fee, $id){

    }

    public function CostPaymentTransaction($cost_fee, $id){


    }

    public function AddCostPaymentTransaction($add_on_cost, $id){

    }

    public function TookInvoice($id){


    }

    //Get Invoice Item
    private function GetInvoiceItems($invoice_id){
        $getResult = DB::table('invoice_item')
            ->select(
                'invoice_item.id','invoice_item.item_type_id','invoice_item.first_feature',
                'invoice_item.second_feature','invoice_item.third_feature','invoice_item.fourth_feature',
                'invoice_item.status','invoice_item.delete_able','invoice_item.out_date','invoice_item.user_id',
                'item_type.type_name'
            )
            ->join('item_type','invoice_item.item_type_id','=','item_type.id')
            ->where('invoice_item.invoice_id','=', $invoice_id)
            ->get();

        $returnArray = array();
        foreach ($getResult as $item){
            $itemModel = InvoiceItemModel::Instance();
            $itemModel->id = $item->id;
            $itemModel->item_type_id = $item->item_type_id;
            $itemModel->item_type_name = $item->type_name;
            $itemModel->first_feature = $item->first_feature;
            $itemModel->second_feature = $item->second_feature;
            $itemModel->third_feature = $item->third_feature;
            $itemModel->fourth_feature = $item->fourth_feature;
            $itemModel->status = $item->status;
            $itemModel->display_status = InvoiceItemStatusEnum::$StatusArray[intval($itemModel->status)];
            $itemModel->delete_able = $item->delete_able;
            $itemModel->out_date = $item->out_date;
            $itemModel->user_id = $item->user_id;

            array_push($returnArray, $itemModel);
        }

        return $returnArray;
    }

}