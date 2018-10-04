<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 8:45 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\SecureLogic;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Base\Model\UserModel;
use Illuminate\Support\Facades\DB;

class UserLogic extends SecureLogic
{

    public const RETURN_DUPLICATE_CODE = 1;
    public const RETURN_DUPLICATE_USERNAME = 2;

    //User Logic Instance
    public function Instance(){
        return new UserLogic();
    }

    //Check Before Insert
    private function checkBeforeInsert($user_name, $user_number){
        $count = 0;
        //Check Username
        $count =+ DB::table('users')
            ->where('email','=', $user_name)->count();
        //Check User Number
        $count = DB::table('users')
            ->where('user_no','=', $user_number)->count();
        //
        $result = ($count == 0) ? true : false;
        return $result;
    }

    //Check Before Update
    private function checkBeforeUpdate($user_name, $user_number, $id){
        $count = 0;
        //Check Username
        $count =+ DB::table('users')
            ->where('email','=', $user_name)
            ->where('id', '<>', $id)
            ->count();
        //Check User Number
        $count = DB::table('users')
            ->where('user_no','=', $user_number)
            ->where('id', '<>', $id)
            ->count();
        //
        $result = ($count == 0) ? true : false;
        return $result;
    }

    //Finalize User Object


    //Add New User Logic
    public function CreateUser(UserModel $user){
        $validate = $this->checkBeforeInsert($user->username, $user->user_number);
        //
        if (!$validate) return false;
        //
        $userId = DB::table('users')
            ->insertGetId([
                'user_no' => $user->user_number,
                'name' => $user->full_name,
                'phone_number' => $user->phone_number,
                'email' => $user->username,
                'password' => bcrypt($user->password),
                'role' => $user->role,
                'note' => $user->note,
                'status' => true,
                'delete_able' => true,
            ]);

        return true;
    }

    //Update User Info
    public function UpdateUser(UserModel $user, $id){
        $validate = $this->checkBeforeUpdate($user->username, $user->user_number, $id);
        //
        if (!$validate) return false;
        //
        $userId = DB::table('users')
            ->insertGetId([
                'user_no' => $user->user_number,
                'name' => $user->full_name,
                'phone_number' => $user->phone_number,
                'email' => $user->username,
                'role' => $user->role,
                'note' => $user->note,
                'status' => GeneralStatus::ACTIVE,
                'delete_able' => true,
            ]);

        return true;
    }

}