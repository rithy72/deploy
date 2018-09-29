<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:48 PM
 */

namespace App\Http\Controllers\Base\Logic;

use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\ChangeLogModel;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\Enum\InvoiceSearchOptionEnum;
use App\Http\Controllers\Base\Model\Enum\InvoiceStatusEnum;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\InvoiceInfoModel;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InvoiceInfoLogic
{

    //Instance Method
    public static function Instance(){
        return new InvoiceInfoLogic();
    }

    //Finalize Search Option
    private function FinalizeSearchOption($searchOption){
        if ($searchOption == InvoiceSearchOptionEnum::CUSTOMER_NAME){
            return "invoice_info.customer_name";
        }elseif ($searchOption == InvoiceSearchOptionEnum::CUSTOMER_PHONE){
            return "invoice_info.customer_phone";
        }elseif ($searchOption == InvoiceSearchOptionEnum::INVOICE_NUMBER){
            return "invoice_info.id";
        }
    }

    //Change Log Edit Invoice Info
    private function ChangeLogEditInvoiceInfo($old_name, $new_name, $old_phone, $new_phone, $old_rate, $new_rate, $array){
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::CUSTOMER_NAME, $old_name, $new_name,
            UserActionEnum::UPDATE, $array);
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::PHONE, $old_phone, $new_phone,
            UserActionEnum::UPDATE, $array);
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::INTEREST_RATE, $old_rate, $new_rate,
            UserActionEnum::UPDATE, $array);

        return $array;
    }

    //Change Log Insert New Invoice Info
    private function ChangeLogInsertInvoiceInfo($name, $phone, $rate, $grand_total, $array){
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::CUSTOMER_NAME, $name, $name,
            UserActionEnum::INSERT, $array);
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::PHONE, $phone, $phone,
            UserActionEnum::INSERT, $array);
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::INTEREST_RATE, $rate, $rate,
            UserActionEnum::INSERT, $array);
        $array = UserAuditLogic::Instance()->CompareField(AuditGroup::GRAND_COST, $grand_total, $grand_total,
            UserActionEnum::INSERT, $array);

        return $array;
    }

    //Filter Search
    public function FilterSearch($search, $search_option, $status, $page_size){
        $searchColumn = $this->FinalizeSearchOption($search_option);
        //
        if (empty($status)){
            //When user don't care about status
            if (empty($search)){
                //When user don't search
                $getResult = DB::table('invoice_info')
                    ->select('invoice_info.id','invoice_info.display_id','invoice_info.customer_name',
                        'invoice_info.customer_phone','invoice_info.grand_total','invoice_info.interests_rate',
                        DB::raw("count(invoice_item.id) as items"),'invoice_info.created_date_time',
                        'invoice_info.expired_date','invoice_info.status')
                    ->leftJoin('invoice_item','invoice_info.id','=','invoice_item.invoice_id')
                    ->groupBy('invoice_info.id')
                    ->paginate($page_size);

                return $getResult;
            }elseif (!empty($search)){
                //When user search
                $getResult = DB::table('invoice_info')
                    ->select('invoice_info.id','invoice_info.display_id','invoice_info.customer_name',
                        'invoice_info.customer_phone','invoice_info.grand_total','invoice_info.interests_rate',
                        DB::raw("count(invoice_item.id) as items"),'invoice_info.created_date_time',
                        'invoice_info.expired_date','invoice_info.status')
                    ->leftJoin('invoice_item','invoice_info.id','=','invoice_item.invoice_id')
                    ->where($searchColumn, 'like', '%'.$search.'%')
                    ->groupBy('invoice_info.id')
                    ->paginate($page_size);

                return $getResult;
            }
        }elseif (!empty($status)){
            //When user care about status
            if (empty($search)){
                //When user don't search
                $getResult = DB::table('invoice_info')
                    ->select('invoice_info.id','invoice_info.display_id','invoice_info.customer_name',
                        'invoice_info.customer_phone','invoice_info.grand_total','invoice_info.interests_rate',
                        DB::raw("count(invoice_item.id) as items"),'invoice_info.created_date_time',
                        'invoice_info.expired_date','invoice_info.status')
                    ->leftJoin('invoice_item','invoice_info.id','=','invoice_item.invoice_id')
                    ->where('invoice_info.status','=', $status)
                    ->groupBy('invoice_info.id')
                    ->paginate($page_size);

                return $getResult;
            }elseif (!empty($search)){
                //When user search
                $getResult = DB::table('invoice_info')
                    ->select('invoice_info.id','invoice_info.display_id','invoice_info.customer_name',
                        'invoice_info.customer_phone','invoice_info.grand_total','invoice_info.interests_rate',
                        DB::raw("count(invoice_item.id) as items"),'invoice_info.created_date_time',
                        'invoice_info.expired_date','invoice_info.status')
                    ->leftJoin('invoice_item','invoice_info.id','=','invoice_item.invoice_id')
                    ->where($searchColumn, 'like', '%'.$search.'%')
                    ->where('invoice_info.status','=', $status)
                    ->groupBy('invoice_info.id')
                    ->paginate($page_size);

                return $getResult;
            }
        }
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

        return $invoiceModel;
    }

    //Create Invoice
    public function Create($invoice_info_model, array $invoice_item_array){
        $changeLogArray = array();
        $dateInstance = DateTimeLogic::Instance();

        if (empty($invoice_info_model->customer_name) || empty($invoice_info_model->grand_total) ||
            empty($invoice_info_model->interests_rate)){
            //Can not insert
            return false;
        }else{
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
            //Change Log
            $changeLogArray = $this->ChangeLogInsertInvoiceInfo(
                $invoice_info_model->customer_name, $invoice_info_model->customer_phone, $invoice_info_model->interests_rate,
                $invoice_info_model->grand_total, $changeLogArray
            );

            //Update Display ID
            $displayId = str_pad(intval($insertID),7,"0", STR_PAD_LEFT);
            DB::table('invoice_info')->where('id','=', $insertID)
                ->update(['display_id' => $displayId]);

            //Insert Item
            foreach ($invoice_item_array as $item){
                InvoiceItemLogic::Instance()->Create($item, $insertID);
                //
                $changeLogArray = UserAuditLogic::Instance()
                    ->CompareEditItem((object)$item, (object)$item, $changeLogArray, UserActionEnum::Add);
            }

            //User Audit
            UserAuditLogic::Instance()
                ->UserInvoiceAction($insertID, UserActionEnum::INSERT, $displayId, $changeLogArray);

            //Update Report
            DailyReportLogic::Instance()
                ->UpdateCurrentReport(sizeof($invoice_item_array), 0, $invoice_info_model->grand_total, 0);

            //Return Invoice ID
            return $displayId;
        }
    }

    //Edit or Update Invoice
    public function Update($invoice_info, $modify_items, $new_items, $delete_items, $invoice_id){
        $changeLogArray = array();
        //Get Old Object of Invoice
        $oldInvoiceObj = $this->Find($invoice_id);

        //Check New Object
        $invoice_info->customer_name = (empty($invoice_info->customer_name)) ?
            $oldInvoiceObj->customer_name : $invoice_info->customer_name;
        $invoice_info->customer_phone = (empty($invoice_info->customer_phone)) ?
            $oldInvoiceObj->customer_phone : $invoice_info->customer_phone;
        $invoice_info->interests_rate = (empty($invoice_info->interests_rate)) ?
            $oldInvoiceObj->interests_rate : $invoice_info->interests_rate;

        //Check if invoice can be update or not
        if ($oldInvoiceObj->status != InvoiceStatusEnum::OPEN){
            //When invoice can not be update
            return false;
        }else{
            //Update Invoice Info Information
            DB::table('invoice_info')
                ->where('id','=', $invoice_id)
                ->update([
                    'customer_name' => $invoice_info->customer_name,
                    'customer_phone' => $invoice_info->customer_phone,
                    'interests_rate' => intval($invoice_info->interests_rate),
                ]);
            //Change Log Invoice Info
            $changeLogArray = $this->ChangeLogEditInvoiceInfo(
                $oldInvoiceObj->customer_name, $invoice_info->customer_name,
                $oldInvoiceObj->customer_phone, $invoice_info->customer_phone,
                $oldInvoiceObj->interests_rate, $invoice_info->interests_rate,
                $changeLogArray
            );

            //Insert New Items
            $newItemsAmount = 0;
            if (!empty($new_items)){
                foreach ($new_items as $item){
                    ++$newItemsAmount;
                    InvoiceItemLogic::Instance()->Create($item, $invoice_id);
                    $changeLogArray = UserAuditLogic::Instance()
                        ->CompareEditItem((object)$item, (object)$item, $changeLogArray, UserActionEnum::Add);
                }
            }

            //Modify Items
            if (!empty($modify_items)){
                foreach ($modify_items as $item){
                    InvoiceItemLogic::Instance()->Update($item, InvoiceItemStatusEnum::OPEN, $invoice_id);
                    //
                    $oldObj = InvoiceItemLogic::Instance()->Find($item['id']);
                    $changeLogArray = UserAuditLogic::Instance()
                        ->CompareEditItem($oldObj, (object)$item, $changeLogArray, UserActionEnum::UPDATE);
                }
            }

            //Delete Items
            $deleteItemsAmount = 0;
            if (!empty($delete_items)){
                foreach ($delete_items as $item){
                    ++$deleteItemsAmount;
                    $oldObj = InvoiceItemLogic::Instance()->Find($item);
                    InvoiceItemLogic::Instance()->Delete($item, $invoice_id);
                    //
                    $changeLogArray = UserAuditLogic::Instance()
                        ->CompareEditItem($oldObj, $oldObj, $changeLogArray, UserActionEnum::DELETE);
                }
            }

            //User Audit Trail
            UserAuditLogic::Instance()->UserInvoiceAction($invoice_id, UserActionEnum::UPDATE,
                $oldInvoiceObj->display_id, $changeLogArray);

            //Update Report
            DailyReportLogic::Instance()->UpdateOldReport($oldInvoiceObj->created_date,
                intval($deleteItemsAmount*-1),0,0,0);
            DailyReportLogic::Instance()->UpdateOldReport($oldInvoiceObj->created_date,
                intval($newItemsAmount*1), 0,0,0);

            //Return Result
            return $invoice_id;
        }
    }

    public function TookInvoice($id){
        $getObj = $this->Find($id);
        $changeLogArray = array();
        $expireDate = $getObj->expire_date;
        $now = DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT);

        //Check if invoice can be took or not
        if ($getObj->status != InvoiceStatusEnum::OPEN || $expireDate > $now) return false;

        //Update Status of Invoice
        DB::table('invoice_info')
            ->where('id','=', $id)
            ->update([
                'status' => InvoiceStatusEnum::TOOK
            ]);

        //Change Log
        $changeLogArray = InvoiceItemLogic::Instance()->TookItems($id);

        //User Audit Trail
        UserAuditLogic::Instance()
            ->UserInvoiceAction($id, UserActionEnum::MARK_TOOK_INVOICE, $getObj->display_id, $changeLogArray);

        return true;
    }

    //Invoice and Item Transaction
    public function InvoiceAndItemTransaction($from_date, $to_date, $action, $group, $invoice_id, $page_size){
        $dateInstance = DateTimeLogic::Instance();
        $from_date = (empty($from_date)) ?
            $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT) :
            $dateInstance->FormatDatTime($from_date, DateTimeLogic::DB_DATE_TIME_FORMAT);
        $to_date = (empty($to_date)) ?
            $dateInstance->AddDaysToCurrentDateDBFormat(90, DateTimeLogic::DB_DATE_TIME_FORMAT) :
            $dateInstance->FormatDatTime($to_date, DateTimeLogic::DB_DATE_TIME_FORMAT);
        $allowGroup = array(AuditGroup::ITEM, AuditGroup::INVOICE);
        //
        $getResult = DB::table('user_record')
            ->select(
                'user_record.id','user_record.parent_id','user_record.display_audit','user_record.description',
                'user_record.change_log','user_record.date_time','users.name'
            )
            ->join('users','user_record.user_id','=','users.id')
            ->where('user_record.parent_id','=', intval($invoice_id))
            //->whereBetween('user_record.date_time', array($from_date, $to_date))
            ->whereIn('user_record.audit_group', $allowGroup)
            //When user want to filter by group and action
            ->when(!empty($group), function ($query) use ($action, $group, $allowGroup){
                if (!in_array($group, $allowGroup)) return $query;
                //When group is in allow group
                if (empty($action)){
                    return $query->where('user_record.audit_group','=',$group);
                }elseif (!empty($action)){
                    return $query->where('user_record.action','=',$action)
                        ->where('user_record.audit_group','=',$group);
                }
            })
            ->paginate($page_size);
        //Append
        $getResult->appends(Input::except('page'));
        //TODO: Finish this
        return $getResult;
    }

}