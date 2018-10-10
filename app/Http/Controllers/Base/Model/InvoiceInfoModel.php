<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 8:37 PM
 */

namespace App\Http\Controllers\Base\Model;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\InvoiceStatusEnum;

class InvoiceInfoModel
{
    public $id;
    public $display_id;
    public $customer_name;
    public $customer_phone;
    public $created_date;
    public $items;
    public $expire_date;
    public $is_late;
    public $late_days;
    public $user_id;
    public $user_full_name;
    public $status;
    public $display_status;
    public $grand_total;
    public $paid;
    public $remain;
    public $interests_rate;
    public $interests_value;
    public $final_date_time;
    public $final_action_user;

    public static function Instance(){
        return new InvoiceInfoModel();
    }

    public static function FinalizeInvoiceObject($invoiceResult){
        $dateInstance = DateTimeLogic::Instance();
        $lateObj = $dateInstance->CheckLate($invoiceResult->expired_date);
        $status = $invoiceResult->status;
        //Manage Info Model
        $invoiceModel = InvoiceInfoModel::Instance();
        $invoiceModel->id = $invoiceResult->id;
        $invoiceModel->display_id = str_pad(intval($invoiceModel->id),
            7,"0", STR_PAD_LEFT);
        $invoiceModel->customer_name = $invoiceResult->customer_name??"";
        $invoiceModel->customer_phone = $invoiceResult->customer_phone??"";
        $invoiceModel->created_date =
            $dateInstance->FormatDatTime($invoiceResult->created_date_time, DateTimeLogic::SHOW_DATE_TIME_FORMAT)??"";
        $invoiceModel->items = (isset($invoiceResult->items)) ? $invoiceResult->items:0;
        $invoiceModel->expire_date = ($status == InvoiceStatusEnum::OPEN) ?
            $dateInstance->FormatDatTime($invoiceResult->expired_date, DateTimeLogic::SHOW_DATE_FORMAT):"-";
        $invoiceModel->is_late = ($status == InvoiceStatusEnum::OPEN) ? $lateObj->is_late:false;
        $invoiceModel->late_days = ($status == InvoiceStatusEnum::OPEN) ? $lateObj->late_days:"-";
        $invoiceModel->user_id = (isset($invoiceResult->user_id)) ? $invoiceResult->user_id:"";
        $invoiceModel->user_full_name = (isset($invoiceResult->name)) ? $invoiceResult->name:"";
        $invoiceModel->status = $invoiceResult->status;
        $invoiceModel->display_status = InvoiceStatusEnum::STATUS_ARRAY[intval($invoiceModel->status)];
        $invoiceModel->grand_total = $invoiceResult->grand_total;
        $invoiceModel->paid = (isset($invoiceResult->paid)) ? $invoiceResult->paid:0;
        $invoiceModel->remain = (isset($invoiceResult->remain)) ? $invoiceResult->remain:0;
        $invoiceModel->interests_rate = (isset($invoiceResult->interests_rate)) ? intval($invoiceResult->interests_rate):0;
        $invoiceModel->interests_value = ($invoiceResult->remain * $invoiceResult->interests_rate) / 100;
        $invoiceModel->final_date_time = (isset($invoiceResult->final_date_time)) ? $invoiceResult->final_date_time:"";
        $invoiceModel->final_action_user = (isset($invoiceResult->final_user)) ? $invoiceResult->final_user : "";

        return $invoiceModel;
    }
}