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

class InitLogic extends Controller
{
    public function InitSuperUser(){
        $userModel = UserModel::Instance();
        $userModel->user_number = "ADMIN-0001";
        $userModel->full_name = "Admin";
        $userModel->phone_number = "-";
        $userModel->note = "";
        $userModel->role = UserRoleEnum::ADMIN;
        $userModel->username = "admin@admin";
        $userModel->password = "admin@admin123456";
        $userModel->status = true;
        $userModel->delete_able = false;

    }
}