<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 8:11 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\ChangeLogModel;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserAuditLogic
{

    //Instance Method
    public static function Instance(){
        return new UserAuditLogic();
    }

    //Record User Action Invoice, create, edit, transaction
    public function UserInvoiceAction($invoice_id, $action_enum, $description, $change_log){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $invoice_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::INVOICE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::INVOICE],
                'description' => $description,
                'change_log' => json_encode($change_log),
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //User Invoice Item Action, sale, depreciate, add more to invoice when transaction
    public function UserInvoiceItemAction($invoice_id, $action_enum, $description, $change_log){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $invoice_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::ITEM,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM],
                'description' => $description,
                'change_log' => json_encode($change_log),
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //Record User Action Item Type, create, edit, delete
    public function UserItemTypeAction($type_id, $action_enum, $description, $change_log){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $type_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::ITEM_TYPE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM_TYPE],
                'description' => $description,
                'change_log' => json_encode($change_log),
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //Record User Action On User and Security, create, edit, delete
    public function UserOnUserAction($type_id, $action_enum, $description, $change_log){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id()??1,
                'parent_id' => $type_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::USER,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::USER],
                'description' => $description,
                'change_log' => json_encode($change_log),
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //Record User Action On Security Login, Logout
    public function UserSecurityAction($type_id, $action_enum, $description, $change_log){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id()??1,
                'parent_id' => $type_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::SECURITY,
                'display_audit' => UserActionEnum::ActionArray[$action_enum],
                'description' => $description,
                'change_log' => json_encode($change_log),
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //Compare Old and New Item Value, create, edit , delete, deprecation, took
    public function CompareEditItem($old_val, $new_val, $change_log_array, $flag){
        $changeLogModel = ChangeLogModel::Instance();
        //Change Log Action and Display Name
        $changeLogModel->action = UserActionEnum::ActionArray[$flag];
        $changeLogModel->showName = AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM];
        //Add more
        if ($flag == UserActionEnum::Add){
            $changeLogModel->oldValue = "";
            //
            $iemType = ItemTypeLogic::Instance()->Find($new_val->item_type_id);
            $changeLogModel->newValue =
                $iemType->item_type_name.', '.$new_val->first_feature.', '.$new_val->second_feature.', '.$new_val->third_feature
                .', '.$new_val->fourth_feature;
        }
        //Edit
        elseif ($flag == UserActionEnum::UPDATE){
            if (json_encode($old_val) == json_encode($new_val)) return $change_log_array;
            //
            $iemType = ItemTypeLogic::Instance()->Find($old_val->item_type_id);
            $changeLogModel->oldValue =
                $iemType->item_type_name.', '.$old_val->first_feature.', '.$old_val->second_feature.', '.$old_val->third_feature
                .', '.$old_val->fourth_feature;
            //
            $iemType = ItemTypeLogic::Instance()->Find($new_val->item_type_id);
            $changeLogModel->newValue =
                $iemType->item_type_name.', '.$new_val->first_feature.', '.$new_val->second_feature.', '.$new_val->third_feature
                .', '.$new_val->fourth_feature;
        }
        //Delete or Depreciation or Took
        elseif ($flag == UserActionEnum::DELETE || $flag == UserActionEnum::DEPRECIATE_ITEM || $flag == UserActionEnum::MARK_TOOK_INVOICE){
            //
            $iemType = ItemTypeLogic::Instance()->Find($old_val->item_type_id);
            $changeLogModel->oldValue =
                $iemType->item_type_name.', '.$old_val->first_feature.', '.$old_val->second_feature.', '.$old_val->third_feature
                .', '.$old_val->fourth_feature;
            //
            $changeLogModel->newValue = "";
        }

        array_push($change_log_array, $changeLogModel);
        return $change_log_array;
    }

    //Compare old and new value, mostly, add, edit, delete, (deactivate and activate for item type and user)
    public function CompareField($field, $old_val, $new_val, $flag, $change_log_array){
        $changeLogModel = ChangeLogModel::Instance();

        //Change Log Action and Show Name in Khmer
        $changeLogModel->action = UserActionEnum::ActionArray[$flag];
        $changeLogModel->showName = AuditGroup::AUDIT_GROUP_STRING[$field];
        //Add or Insert
        if ($flag == UserActionEnum::Add || $flag == UserActionEnum::INSERT){
            $changeLogModel->oldValue = "";
            $changeLogModel->newValue = $new_val;
        }
        //Delete or Deactivate or Activate
        elseif ($flag == UserActionEnum::DELETE || $flag == UserActionEnum::DEACTIVATE || $flag == UserActionEnum::ACTIVATE){
            $changeLogModel->oldValue = $old_val;
            $changeLogModel->newValue = "";
        }
        //Edit or Update
        elseif($flag == UserActionEnum::UPDATE){
            if ($old_val == $new_val) return $change_log_array;

            $changeLogModel->oldValue = $old_val;
            $changeLogModel->newValue = $new_val;
        }

        array_push($change_log_array, $changeLogModel);
        return $change_log_array;
    }

    //Filter Search
    public function search($from_date, $to_date, $group, $action, $page_size){
        $dateInstance = DateTimeLogic::Instance();
        $startOfUsing = DailyReportLogic::Instance()->GetStartDayOfUsing();
        //
        $fromDate = (empty($from_date)) ?
            $dateInstance->FormatDatTime($startOfUsing, 'Y-m-d 00:00:00') :
            $dateInstance->FormatDatTime($from_date, 'Y-m-d 00:00:00');
        $toDate = (empty($to_date)) ?
            $dateInstance->AddDaysToCurrentDateDBFormat(90, 'Y-m-d 00:00:00') :
            $dateInstance->FormatDatTime($to_date, 'Y-m-d 00:00:00');
        $allowGroup = array(AuditGroup::ITEM, AuditGroup::INVOICE, AuditGroup::USER, AuditGroup::SECURITY, AuditGroup::ITEM_TYPE);
        //
        $getResult = DB::table('user_record')
            ->select(
                'user_record.id','user_record.parent_id','user_record.display_audit','user_record.description',
                'user_record.change_log','user_record.date_time','users.name'
            )
            ->join('users','user_record.user_id','=','users.id')
            //->whereBetween('user_record.date_time', array($from_date, $to_date))
            //->where('user_record.user_id','=', $user_id)
            //When user want to filter by group and action
            ->when(!empty($group), function ($query) use ($action, $group, $allowGroup){
                if (!in_array($group, $allowGroup)) return $query;
                //
                if (!empty($action)){
                    return $query->where('user_record.audit_group', '=', $group)
                        ->where('user_record.action', '=', $action);
                }
                //
                return $query->where('user_record.audit_group', '=', $group);
            })
            //When user has date range
            ->whereBetween('user_record.date_time', array($fromDate, $toDate))
            //->orderBy('user_record.date_time','asc')
            ->paginate($page_size);
        //Append
        $getResult->appends(Input::except('page'));

        return $getResult;
    }

}