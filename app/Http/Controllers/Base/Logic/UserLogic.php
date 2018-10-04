<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 8:45 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\SecureLogic;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Base\Model\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserLogic extends SecureLogic
{

    public const RETURN_DUPLICATE_CODE = 1;
    public const RETURN_DUPLICATE_USERNAME = 2;

    //User Logic Instance
    public static function Instance(){
        return new UserLogic();
    }

    //Check Before Insert
    private function checkBeforeInsert($user_name, $user_number){
        if (empty($user_name) || empty($user_number)) return false;
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
        if (empty($user_name) || empty($user_number)) return false;
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

    //Find User
    public function Find($user_id){
        $userObj = DB::table('users')->where('id','=', $user_id)->first();
        //
        $returnModel = UserModel::FinalizeObject($userObj);
        //
        return $returnModel;
    }

    //Add New User Logic
    public function CreateUser(UserModel $user){
        $validate = $this->checkBeforeInsert($user->email, $user->user_no);
        //
        if (!$validate || empty($user->name)) return false;
        //
        $userId = DB::table('users')
            ->insertGetId([
                'user_no' => $user->user_no,
                'name' => $user->name,
                'phone_number' => $user->phone_number,
                'email' => $user->email,
                'password' => bcrypt($user->password),
                'role' => $user->role,
                'note' => $user->note,
                'status' => true,
                'delete_able' => true,
                'created_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'created_by' => Auth::id()
            ]);
        //TODO: Finish User Audit Trail and Change Log
        return true;
    }

    //Update User Info
    public function UpdateUser(UserModel $user, $id){
        $userOldObj = $this->Find($id);
        $validate = $this->checkBeforeUpdate($user->email, $user->user_no, $id);
        //
        if (!$validate) return false;
        $user->name = (!empty($user->name)) ? $user->name : $userOldObj->name;
        //
        $userId = DB::table('users')
            ->insertGetId([
                'user_no' => $user->user_no,
                'name' => $user->name,
                'phone_number' => $user->phone_number,
                'email' => $user->email,
                'role' => $user->role,
                'note' => $user->note,
                'status' => GeneralStatus::ACTIVE,
                'delete_able' => true,
                'last_update_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id()
            ]);
        //TODO: Finish User Audi Trail and Change Log
        return true;
    }

}