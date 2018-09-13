<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 8:11 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAuditLogic
{

    //Instance Method
    public static function Instance(){
        return new UserAuditLogic();
    }

    //Record User Create Invoice
    public function UserAddNewInvoice($invoice_id){
        $insertResult = DB::table('user_record')
            ->insert([
                'user_id' => Auth::id(),
                'invoice_id' => $invoice_id,
                'action' => UserActionEnum::INSERT,
                'action_detail' => UserActionEnum::ActionArray[UserActionEnum::INSERT],
                'date_time' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);

        return $insertResult;
    }

}