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
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAuditLogic
{

    //Instance Method
    public static function Instance(){
        return new UserAuditLogic();
    }

    //Record User Action Invoice
    public function UserInvoiceAction($invoice_id, $action_enum, $description){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $invoice_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::INVOICE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::INVOICE],
                'detail' => $description,
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    public function UserInvoiceItemAction($invoice_id, $action_enum, $description){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $invoice_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::ITEM_TYPE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM_TYPE],
                'detail' => $description,
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //Record User Action Item Type
    public function UserItemTypeAction($type_id, $action_enum, $description){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $type_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::ITEM_TYPE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM_TYPE],
                'detail' => $description,
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //TODO: Generate Old Object For Delete and Other Action beside Create and Modify
    //Compare Old and New Item Value
    public function CompareEditItem($old_val, $new_val, $change_log_array, $flag){
        $changeLogModel = ChangeLogModel::Instance();

        if (json_encode($old_val) != json_encode($new_val)){
            $changeLogModel->action = UserActionEnum::ActionArray[$flag];
            $changeLogModel->showName = AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM];
            //Old Value
            $iemType = ItemTypeLogic::Instance()->Find($old_val->item_type_id);
            $changeLogModel->oldValue =
                $iemType->item_type_name.'-'.$old_val->first_feature.'-'.$old_val->second_feature.'-'.$old_val->third_feature
                .'-'.$old_val->fourth_feature;
            //New Value
            if($flag == UserActionEnum::UPDATE){
                $iemType = ItemTypeLogic::Instance()->Find($new_val->item_type_id);
                $changeLogModel->newValue =
                    $iemType->item_type_name.'-'.$new_val->first_feature.'-'.$new_val->second_feature.'-'.$new_val->third_feature
                    .'-'.$new_val->fourth_feature;
            }else{
                $changeLogModel->newValue = "";
            }

            array_push($change_log_array, $changeLogModel);
        }

        return $change_log_array;
    }

    //Compare old and new value
    public function CompareField($field, $old_val, $new_val, $flag, $change_log_array){
        $changeLogModel = ChangeLogModel::Instance();

        if ($old_val != $new_val){
            $changeLogModel->action = UserActionEnum::ActionArray[$flag];
            $changeLogModel->showName = AuditGroup::FIELD_STRING[$field];
            //Old Value
            $changeLogModel->oldValue = $old_val;
            //New Value
            if($flag == UserActionEnum::UPDATE){
                $changeLogModel->newValue = $new_val;
            }else{
                $changeLogModel->newValue = "";
            }

            array_push($change_log_array, $changeLogModel);
        }

        return $change_log_array;
    }

}