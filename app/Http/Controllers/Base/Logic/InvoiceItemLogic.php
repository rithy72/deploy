<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:53 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use App\Http\Controllers\Base\Model\Other\PaginateModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InvoiceItemLogic
{

    //Depreciation Type
    public const DEPRECIATION_ALL = 1;
    public const DEPRECIATION_ONE = 2;

    //Instance Method
    public static function Instance(){
        return new InvoiceItemLogic();
    }

    //Find Item
    public function Find($item_id){
        $item = DB::table('invoice_item')
            ->select(
                'invoice_item.id','invoice_item.invoice_id','invoice_item.item_type_id',
                'invoice_item.first_feature','invoice_item.second_feature','invoice_item.third_feature',
                'invoice_item.fourth_feature','invoice_item.status','invoice_item.delete_able',
                'invoice_item.out_date','invoice_item.user_id as out_user','item_type.type_name','invoice_item.in_date',
                'in_taker.name as in_user','invoice_item.sale_price'
            )
            ->leftJoin('item_type','invoice_item.item_type_id','=','item_type.id')
            ->leftJoin('users as in_taker','invoice_item.in_user_id','=','in_taker.id')
            ->where('invoice_item.id','=', $item_id)
            ->first();

        $itemModel = InvoiceItemModel::FinalizeItemObject((object)$item);

        return $itemModel;
    }

    //Filter Search Items
    public function FilterSearch($search, $status, $item_type, $page_size){
        //Split Search Parameter
        $splitSearch = explode(',', $search);
        $invoiceId = (array_key_exists(0, $splitSearch)) ? $splitSearch[0] : "";
        $firstFeature = (array_key_exists(1, $splitSearch)) ? $splitSearch[1] : "";
        $secondFeature = (array_key_exists(2, $splitSearch)) ? $splitSearch[2] : "";
        $thirdFeature = (array_key_exists(3, $splitSearch)) ? $splitSearch[3] : "";
        $fourthFeature = (array_key_exists(4, $splitSearch)) ? $splitSearch[4] : "";
        //Split Status Parameter
        $splitStatus = explode(',', $status);
        //Querying
        $getResult = DB::table('invoice_item')
            ->select(
                'invoice_item.id','invoice_item.invoice_id','invoice_item.item_type_id',
                'invoice_item.first_feature','invoice_item.second_feature','invoice_item.third_feature',
                'invoice_item.fourth_feature','invoice_item.status','invoice_item.delete_able',
                'invoice_item.out_date','users.name as out_user','item_type.type_name','invoice_info.id as id_invoice',
                'invoice_info.display_id','item_type.type_name','invoice_item.in_date',
                'in_taker.name as in_user','invoice_item.sale_price'
            )
            ->leftJoin('item_type','invoice_item.item_type_id','=','item_type.id')
            ->leftJoin('users','invoice_item.user_id','=','users.id')
            ->leftJoin('users as in_taker','invoice_item.in_user_id','=','in_taker.id')
            ->join('invoice_info','invoice_item.invoice_id','=', 'invoice_info.id')
            //When user want status
            ->when(!empty($status), function ($query) use ($splitStatus){
                return $query->whereIn('invoice_item.status', $splitStatus);
            })
            //When user want item type
            ->when(!empty($item_type), function ($query) use ($item_type){
                return $query->where('invoice_item.item_type_id','=',$item_type);
            })
            //When user want to filter search by invoice id
            ->when(!empty($invoiceId), function ($query) use ($invoiceId){
                return $query->where('invoice_item.invoice_id','=',$invoiceId);
            })
            //When user search only have 1st feature
            ->when(!empty($firstFeature) && $firstFeature != "", function ($query) use ($firstFeature){
                return $query
                    ->where('invoice_item.first_feature','like','%'.$firstFeature.'%');
            })
            //When user search only have 2nd feature
            ->when(!empty($secondFeature) && $secondFeature != "", function ($query) use ($secondFeature){
                return $query
                    ->where('invoice_item.second_feature','like','%'.$secondFeature.'%');
            })
            //When user search only have 3rd feature
            ->when(!empty($thirdFeature) && $thirdFeature != "", function ($query) use ($thirdFeature){
                return $query
                    ->where('invoice_item.third_feature','like','%'.$thirdFeature.'%');
            })
            //When user search only have 4th feature
            ->when(!empty($fourthFeature) && $fourthFeature != "", function ($query) use ($fourthFeature){
                return $query
                    ->where('invoice_item.fourth_feature','like','%'.$fourthFeature.'%');
            })
            ->paginate($page_size);
        //Append Every Parameter
        $getResult->appends(Input::except('page'));
        //Modify Result
        $returnArray = array();
        foreach ($getResult as $item){
            $itemModel = InvoiceItemModel::FinalizeItemObject((object)$item);
            array_push($returnArray, $itemModel);
        }
        //Generate New Paginate Model
        $newModel = PaginateModel::Instance()->FinalizePaginateModel($returnArray, $getResult);

        return $newModel;
    }

    //Insert Item Method
    public function Create($invoice_item_model, $invoice_id){
        //Insert Invoice Items
        $insertResult = DB::table('invoice_item')
            ->insertGetId([
                'invoice_id' => $invoice_id,
                'item_type_id' => $invoice_item_model['item_type_id'],
                'first_feature' => $invoice_item_model['first_feature'],
                'second_feature' => $invoice_item_model['second_feature'],
                'third_feature' => $invoice_item_model['third_feature'],
                'fourth_feature' => $invoice_item_model['fourth_feature'],
                'status' => InvoiceItemStatusEnum::OPEN,
                'in_date' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'in_user_id' => Auth::id()
            ]);

        //Make Item Type Can Not Delete
        ItemTypeLogic::Instance()->MakeItemTypeUnDeleteAble($invoice_item_model['item_type_id']);

        return $insertResult;
    }

    //Update Item
    public function Update($invoice_item_model, $item_status, $invoice_id){
        //Modify Invoice Items
        $insertResult = DB::table('invoice_item')
            ->where('invoice_id','=', $invoice_id)
            ->where('id','=', $invoice_item_model['id'])
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
    public function DepreciationItems($choice, $array_of_item, $invoice_id){
        if ($invoice_id == null || empty($invoice_id)) return 0;

        $changeLogArray = array();
        $items = array();
        $outItem = 0;

        if ($choice == InvoiceItemLogic::DEPRECIATION_ONE){
            foreach ($array_of_item as $item){
                //Get this item
                $getItem = DB::table('invoice_item')
                    ->where('id','=', $item)
                    ->where('status','=', InvoiceItemStatusEnum::OPEN)
                    ->first();
                array_push($items, $getItem);

                //Mean depreciate only item with id
                DB::table('invoice_item')
                    ->where('invoice_id','=', $invoice_id)
                    ->where('id','=', $item)
                    ->update([
                        'status' => InvoiceItemStatusEnum::CLOSE,
                        'out_date' => DateTimeLogic::Instance()->
                        GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                        'user_id' => Auth::id()
                    ]);
                $outItem++;
            }

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

        if (empty($outItem) || $outItem == 0) return $outItem;
        //Change Logs
        foreach ($items as $item){
            $changeLogArray = UserAuditLogic::Instance()
                ->CompareEditItem((object)$item, (object)$item, $changeLogArray, UserActionEnum::DEPRECIATE_ITEM);
        }
        //User Audit Trail
        $invoiceObj = InvoiceInfoLogic::Instance()->Find($invoice_id);
        UserAuditLogic::Instance()
            ->UserInvoiceItemAction($invoice_id, UserActionEnum::DEPRECIATE_ITEM,
                AuditGroup::AUDIT_GROUP_STRING[AuditGroup::INVOICE]." - ".$invoiceObj->display_id, $changeLogArray);

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
                'user_id' => Auth::id(),
                'sale_price' => floatval($sale_price)
            ]);

        //Transaction Record
        InvoicePaymentLogic::Instance()
            ->TransactionRecord($item->invoice_id, UserActionEnum::SALE_ITEM, $sale_price);

        //Update Daily Report
        DailyReportLogic::Instance()->UpdateCurrentReport(0, abs(1), 0, abs($sale_price));

        //User Audit
        $description = $item->item_type_name.', '.$item->first_feature.' ,'.$item->second_feature.', '.$item->third_feature
            .', '.$item->fourth_feature.' -- តម្លៃ៖ '.$sale_price." $";
        UserAuditLogic::Instance()->UserInvoiceItemAction($item->invoice_id, UserActionEnum::SALE_ITEM, $description, []);

        return true;
    }

    //Took Items
    public function TookItems($invoice_id){
        $changeLogArray = array();

        $getRemainItem = $this->GetInvoiceItemsForInvoice($invoice_id, InvoiceItemStatusEnum::OPEN);

        if (empty($getRemainItem)) return $changeLogArray;

        DB::table('invoice_item')
            ->where('invoice_id','=', $invoice_id)
            ->where('status','=', InvoiceItemStatusEnum::OPEN)
            ->update([
               'status' => InvoiceItemStatusEnum::TOOK
            ]);

        foreach ($getRemainItem as $item){
            //Update status
            $changeLogArray = UserAuditLogic::Instance()
                ->CompareEditItem((object)$item, (object)$item, $changeLogArray, UserActionEnum::MARK_TOOK_INVOICE);
        }

        return $changeLogArray;
    }

    //Get Invoice Item For Invoice
    public function GetInvoiceItemsForInvoice($invoice_id, $status){
        $getResult = DB::table('invoice_item')
            ->select(
                'invoice_item.id','invoice_item.invoice_id','invoice_item.item_type_id',
                'invoice_item.first_feature','invoice_item.second_feature','invoice_item.third_feature',
                'invoice_item.fourth_feature','invoice_item.status','invoice_item.delete_able',
                'invoice_item.out_date','users.name as out_user','item_type.type_name','invoice_item.in_date',
                'in_taker.name as in_user','invoice_item.sale_price'
            )
            ->leftJoin('item_type','invoice_item.item_type_id','=','item_type.id')
            ->leftJoin('users','invoice_item.user_id','=','users.id')
            ->leftJoin('users as in_taker','invoice_item.in_user_id','=','in_taker.id')
            ->where('invoice_item.invoice_id','=', $invoice_id)
            //When user want status
            ->when(!empty($status), function ($query) use ($status){
                return $query->where('invoice_item.status','=',$status);
            })
            ->orderBy('invoice_item.status')
            ->get();


        $returnArray = array();
        foreach ($getResult as $item){
            $itemModel = InvoiceItemModel::FinalizeItemObject((object)$item);
            array_push($returnArray, $itemModel);
        }

        return $returnArray;
    }

}