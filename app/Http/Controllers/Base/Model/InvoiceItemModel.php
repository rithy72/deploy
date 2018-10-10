<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 8:37 PM
 */

namespace App\Http\Controllers\Base\Model;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;

class InvoiceItemModel
{
    public $id;
    public $invoice_id;
    public $display_invoice_id;
    public $item_type_id;
    public $item_type_name;
    public $first_feature;
    public $second_feature;
    public $third_feature;
    public $fourth_feature;
    public $status;
    public $display_status;
    public $delete_able;
    public $out_date;
    public $user_id;
    public $in_date;
    public $in_user;
    public $sale_price;

    public static function Instance(){
        return new InvoiceItemModel();
    }

    public static function FinalizeItemObject($item){
        $dateInstance = DateTimeLogic::Instance();
        $itemModel = InvoiceItemModel::Instance();
        $itemModel->id = $item->id;
        $itemModel->invoice_id = $item->invoice_id;
        $itemModel->display_invoice_id = str_pad(intval($item->invoice_id),
            7,"0", STR_PAD_LEFT);
        $itemModel->item_type_id = $item->item_type_id;
        $itemModel->item_type_name = $item->type_name;
        $itemModel->first_feature = $item->first_feature??"-";
        $itemModel->second_feature = $item->second_feature??"-";
        $itemModel->third_feature = $item->third_feature??"-";
        $itemModel->fourth_feature = $item->fourth_feature??"-";
        $itemModel->status = $item->status;
        $itemModel->display_status = InvoiceItemStatusEnum::$StatusArray[intval($itemModel->status)];
        $itemModel->delete_able = $item->delete_able;
        $itemModel->out_date = (!empty($item->out_date)) ?
            $dateInstance->FormatDatTime($item->out_date, DateTimeLogic::SHOW_DATE_TIME_FORMAT):"-";
        $itemModel->user_id = $item->out_user??"-";
        $itemModel->in_date = $dateInstance->FormatDatTime($item->in_date, DateTimeLogic::SHOW_DATE_TIME_FORMAT);
        $itemModel->in_user = $item->in_user;
        $itemModel->sale_price = $item->sale_price??"-";

        return $itemModel;
    }
}