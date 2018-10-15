<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 8:41 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SecureLogic
{
    //Instance
    public static function Instance(){
        return new SecureLogic();
    }

    //Check Admin Password
    public function CheckAdminPassword($password){
        $userObj = UserLogic::Instance()->Find(Auth::id());
        //Check
        if (Hash::check($password, $userObj->password)){
            if ($userObj->role != UserRoleEnum::ADMIN) return false;
            return true;
        }
        return false;
    }

    //Check Username and Password Current User
    public function CheckUsernamePassword($username, $password){
        $userObj = UserLogic::Instance()->Find(Auth::id());
        //
        $checkPassword = Hash::check($password, $userObj->password);
        if ($checkPassword && $userObj->email == $username) return true;
        return false;
    }

}