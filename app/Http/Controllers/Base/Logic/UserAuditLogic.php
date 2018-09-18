<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 8:11 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAuditLogic
{

    //Instance Method
    public static function Instance(){
        return new UserAuditLogic();
    }

    //Record User Action Invoice
    public function UserInvoiceAction($invoice_id, $action_enum){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $invoice_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::INVOICE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::INVOICE],
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

    //Record User Action Item Type
    public function UserItemTypeAction($type_id, $action_enum){
        $insertResult = DB::table('user_record')
            ->insertGetId([
                'user_id' => Auth::id(),
                'parent_id' => $type_id,
                'action' => $action_enum,
                'audit_group' => AuditGroup::ITEM_TYPE,
                'display_audit' => UserActionEnum::ActionArray[$action_enum]." - ".
                    AuditGroup::AUDIT_GROUP_STRING[AuditGroup::ITEM_TYPE],
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

}