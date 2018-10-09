<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 9:29 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


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
        //Sothea
        $userModel = UserModel::Instance();
        $userModel->user_no = "S001";
        $userModel->name = "Sothea";
        $userModel->phone_number = "-";
        $userModel->note = "";
        $userModel->role = UserRoleEnum::ADMIN;
        $userModel->email = "sothea@admin";
        $userModel->password = "sothea@admin123456";
        $userModel->status = true;
        $userModel->delete_able = false;
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
                'delete_able' => false,
                'created_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
            ]);

        //Phorn
        $userModel = UserModel::Instance();
        $userModel->user_no = "P001";
        $userModel->name = "Phorn";
        $userModel->phone_number = "-";
        $userModel->note = "";
        $userModel->role = UserRoleEnum::ADMIN;
        $userModel->email = "phorn@admin";
        $userModel->password = "phorn@admin123456";
        $userModel->status = true;
        $userModel->delete_able = false;
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
                'delete_able' => false,
                'created_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
            ]);

        //Rithy
        $userModel = UserModel::Instance();
        $userModel->user_no = "R001";
        $userModel->name = "Rithy";
        $userModel->phone_number = "-";
        $userModel->note = "";
        $userModel->role = UserRoleEnum::ADMIN;
        $userModel->email = "rithy@admin";
        $userModel->password = "rithy@admin123456";
        $userModel->status = true;
        $userModel->delete_able = false;
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
                'delete_able' => false,
                'created_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
            ]);
    }
}