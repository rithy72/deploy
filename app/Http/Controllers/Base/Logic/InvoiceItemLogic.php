<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:53 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceItemLogic
{

    //Depreciation Type
    public const DEPRECIATION_ALL = 1;
    public const DEPRECIATION_ONE = 2;

    //Instance Method
    public static function Instance(){
        return new InvoiceItemLogic();
    }

    public function Find($item_id){
        $item = DB::table('invoice_item')
            ->select(
                'invoice_item.id','invoice_item.invoice_id','invoice_item.item_type_id',
                'invoice_item.first_feature','invoice_item.second_feature','invoice_item.third_feature',
                'invoice_item.fourth_feature','invoice_item.status','invoice_item.delete_able',
                'invoice_item.out_date','invoice_item.user_id','item_type.type_name'
            )
            ->leftJoin('item_type','invoice_item.item_type_id','=','item_type.id')
            ->where('invoice_item.id','=', $item_id)
            ->first();

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

        return $itemModel;
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

    //Depreciation Items
    public function DepreciationItems($choice, $id, $invoice_id){
        if ($invoice_id == null || empty($invoice_id)) return 0;

        $changeLogArray = array();
        $items = array();
        $outItem = 0;

        if ($choice == InvoiceItemLogic::DEPRECIATION_ONE){
            //Get this item
            $items = DB::table('invoice_item')
                ->where('id','=', $id)
                ->where('status','=', InvoiceItemStatusEnum::OPEN)
                ->get();
            //Mean depreciate only item with id
            DB::table('invoice_item')
                ->where('invoice_id','=', $invoice_id)
                ->where('id','=', $id)
                ->update([
                    'status' => InvoiceItemStatusEnum::CLOSE,
                    'out_date' => DateTimeLogic::Instance()->
                        GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                    'user_id' => Auth::id()
                ]);

            $outItem = 1;
        }elseif ($choice == InvoiceItemLogic::DEPRECIATION_ALL){
            //Get Remain Item of Invoice
            $items = DB::table('invoice_item')
                ->where('invoice_id','=', $invoice_id)
                ->where('status','=', InvoiceItemStatusEnum::OPEN)
                ->get();

            //Mean depreciate all item with invoice id
            DB::table('invoice_item')
                ->where('invoice_id','=', $invoice_id)
                ->update([
                    'status' => InvoiceItemStatusEnum::CLOSE,
                    'out_date' => DateTimeLogic::Instance()->
                    GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                    'user_id' => Auth::id()
                ]);

            $outItem = sizeof($items);
        }

        //Change Logs
        foreach ($items as $item){
            $changeLogArray = UserAuditLogic::Instance()
                ->CompareEditItem((object)$item, (object)$item, $changeLogArray, UserActionEnum::DEPRECIATE_ITEM);
        }
        //User Audit Trail
        $invoiceObj = InvoiceInfoLogic::Instance()->Find($invoice_id);
        UserAuditLogic::Instance()
            ->UserInvoiceItemAction($invoice_id, UserActionEnum::DEPRECIATE_ITEM,
                $invoiceObj->display_id, $changeLogArray);
        //Update Daily Report
        DailyReportLogic::Instance()->UpdateCurrentReport(0, abs($outItem), 0,0);

        return $outItem;
    }

    //Sale Item
    public function SaleInvoiceItem($item_id, $sale_price){
        $item = $this->Find($item_id);

        if ($item->status != InvoiceItemStatusEnum::TOOK) return false;

        DB::table('invoice_item')
            ->where('id','=', $item_id)
            ->update([
                'status' => InvoiceItemStatusEnum::SOLD,
                'out_date' => DateTimeLogic::Instance()->
                GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'user_id' => Auth::id()
            ]);

        //Update Daily Report
        DailyReportLogic::Instance()->UpdateCurrentReport(0, abs(1), 0, abs($sale_price));

        //User Audit
        $description = $item->item_type_name.', '.$item->first_feature.' ,'.$item->second_feature.', '.$item->third_feature
            .', '.$item->fourth_feature.' -- តម្លៃ៖ '.$sale_price;
        UserAuditLogic::Instance()->UserInvoiceItemAction($item->invoice_id, UserActionEnum::SALE_ITEM, $description, []);

        return true;
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