<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Base\Model\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class InitLogic extends Controller
{
    public static function InitSuperUser(){
        //Check
        $count = DB::table('users')->count();
        if ($count > 0) return;

        $userModel = UserModel::Instance();
        $userModel->user_no = "ADMIN-0001";
        $userModel->name = "Admin";
        $userModel->phone_number = "-";
        $userModel->note = "";
        $userModel->role = UserRoleEnum::ADMIN;
        $userModel->email = "admin@admin";
        $userModel->password = "admin@admin123456";
        $userModel->status = true;
        $userModel->delete_able = false;

        $changeLogArray = array();

        $userId = DB::table('users')
            ->insertGetId([
                'user_no' => $userModel->user_no,
                'name' => $userModel->name,
                'phone_number' => $userModel->phone_number,
                'email' => $userModel->email,
                'password' => bcrypt($userModel->password),
                'role' => $userModel->role,
                'note' => $userModel->note,
                'status' => true,
                'delete_able' => true,
                'created_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
            ]);
        $userObj = UserLogic::Instance()->Find($userId);
        //Change Log Array
        $changeLogArray = UserLogic::Instance()->InsertChangeLog($userObj, $userObj, $changeLogArray);
        //Audit
        UserAuditLogic::Instance()->UserOnUserAction(
            $userId, UserActionEnum::INSERT, $userObj->user_no."-".$userObj->name, $changeLogArray);
    }
}