<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 8:41 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use Illuminate\Support\Facades\Auth;

class SecureLogic
{
    protected function CheckAdminPassword($password){
        $encryptPassword = bcrypt($password);
        //Check
        if (Auth::user()->role != UserRoleEnum::ADMIN || Auth::user()->getAuthPassword() != $encryptPassword){
            return false;
        }
        return true;
    }
}