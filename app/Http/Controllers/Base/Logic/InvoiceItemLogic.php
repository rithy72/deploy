<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:53 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Support\Facades\DB;

class InvoiceItemLogic
{

    //Instance Method
    public static function Instance(){
        return new InvoiceItemLogic();
    }

    //Insert Item Method
    public function Create($invoice_item_model, $invoice_id){
        //Insert Invoice Items
        $insertResult = DB::table('invoice_item')
            ->insert([
                'invoice_id' => $invoice_id,
                'item_type_id' => $invoice_item_model['item_type_id'],
                'first_feature' => $invoice_item_model['first_feature'],
                'second_feature' => $invoice_item_model['second_feature'],
                'third_feature' => $invoice_item_model['third_feature'],
                'fourth_feature' => $invoice_item_model['fourth_feature'],
                'status' => InvoiceItemStatusEnum::OPEN,
            ]);

        //Make Item Type Can Not Delete
        ItemTypeLogic::Instance()->MakeItemTypeUnDeleteAble($invoice_item_model['item_type_id']);

        return $insertResult;
    }

    //Update Invoice
    public function Update($invoice_item_model, $item_status, $invoice_id){
        //Modify Invoice Items
        $insertResult = DB::table('invoice_item')
            ->where('invoice_id','=', $invoice_id)
            ->update([
                'item_type_id' => $invoice_item_model['item_type_id'],
                'first_feature' => $invoice_item_model['first_feature'],
                'second_feature' => $invoice_item_model['second_feature'],
                'third_feature' => $invoice_item_model['third_feature'],
                'fourth_feature' => $invoice_item_model['fourth_feature'],
                'status' => $item_status,
            ]);

        //Make Item Type Can Not Delete
        ItemTypeLogic::Instance()->MakeItemTypeUnDeleteAble($invoice_item_model['item_type_id']);

        return $insertResult;
    }

    //Delete Item From Invoice
    public function Delete($item_id, $invoice_id){
        //Delete Item
        $insertResult = DB::table('invoice_item')
            ->where('invoice_id','=', $invoice_id)
            ->where('id','=',$item_id)
            ->delete();

        return $insertResult;
    }

    //Get Invoice Item For Invoice
    public function GetInvoiceItemsForInvoice($invoice_id){
        $getResult = DB::table('invoice_item')
            ->select(
                'invoice_item.id','invoice_item.invoice_id','invoice_item.item_type_id',
                'invoice_item.first_feature','invoice_item.second_feature','invoice_item.third_feature',
                'invoice_item.fourth_feature','invoice_item.status','invoice_item.delete_able',
                'invoice_item.out_date','invoice_item.user_id','item_type.type_name'
            )
            ->leftJoin('item_type','invoice_item.item_type_id','=','item_type.id')
            ->where('invoice_item.invoice_id','=', $invoice_id)
            ->get();

        $returnArray = array();
        foreach ($getResult as $item){
            $itemModel = InvoiceItemModel::Instance();
            $itemModel->id = $item->id;
            $itemModel->invoice_id = $item->invoice_id;
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