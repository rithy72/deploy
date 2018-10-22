<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 10:05 PM
 */

namespace App\Http\Controllers\Base\Model;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserModel
{
    public $id;
    public $user_no;
    public $name;
    public $phone_number;
    public $note;
    public $role;
    public $display_role;
    public $email;
    public $username;
    public $password;
    public $status;
    public $display_status;
    public $delete_able;
    public $created_date;
    public $created_by;
    public $last_update_date;
    public $last_update_by;
    public $deleted;
    public $just_update;

    //Instance
    public static function Instance(){
        return new UserModel();
    }

    //Finalize User Object
    public static function FinalizeObject($user_object){
        if (empty($user_object) || $user_object == null)
            return UserModel::Instance();
        //
        $userModel = UserModel::Instance();
        $userModel->id = $user_object->id;
        $userModel->user_no = $user_object->user_no;
        $userModel->name = $user_object->name;
        $userModel->phone_number = (isset($user_object->phone_number) && !empty($user_object->phone_number)) ?
            $user_object->phone_number:"-";
        $userModel->note = (isset($user_object->note) && !empty($user_object->phone_number)) ? $user_object->note:"";
        $userModel->role = $user_object->role;
        $userModel->display_role = ucfirst($user_object->role);
        $userModel->email = (isset($user_object->email) && !empty($user_object->phone_number)) ? $user_object->email:"";
        $userModel->username = (isset($user_object->username) && !empty($user_object->username)) ? $user_object->username : "";
        $userModel->password = (isset($user_object->password) && !empty($user_object->phone_number)) ? $user_object->password:"";
        $userModel->status = $user_object->status;
        $userModel->display_status = GeneralStatus::DisplayStatus[$user_object->status];
        $userModel->delete_able = UserLogic::Instance()->checkIfUserCanbeDelete($user_object->id);
        $userModel->created_date = (!empty($user_object->created_date)) ?
            DateTimeLogic::Instance()->FormatDatTime($user_object->created_date, DateTimeLogic::SHOW_DATE_TIME_FORMAT)
            :"-";
        $userModel->created_by = (!empty($user_object->created_by)) ?
            UserLogic::Instance()->Find($user_object->created_by)->name:"System";
        //
        $userModel->last_update_date = (!empty($user_object->last_update_date)) ?
            DateTimeLogic::Instance()->FormatDatTime($user_object->last_update_date, DateTimeLogic::SHOW_DATE_TIME_FORMAT)
            :"-";
        $userModel->last_update_by = (!empty($user_object->last_update_by)) ?
            UserLogic::Instance()->Find($user_object->last_update_by)->name:"-";
        //
        $userModel->deleted = $user_object->deleted;
        $userModel->just_update = $user_object->just_updated;
        return $userModel;
    }

    //Get User Reset Password Token
    public function GetResetPasswordToken(){
        $userObj = UserLogic::Instance()->Find(Auth::id());
        $getResult = DB::table('users')->where('id','=', $userObj->id)->first();
        return $getResult->remember_token;
    }

    //Check User Number Before Insert
    public static function checkUserNumberInsert($user_number){
        $count = DB::table('users')
            ->where('user_no','=', $user_number)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check Username Before Insert
    public static function checkUsernameInsert($user_number){
        $count = DB::table('users')
            ->where('username','=', $user_number)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check UserEmail Before Insert
    public static function checkEmailBeforeInsert($email){
        $count = DB::table('users')
            ->where('email','=', $email)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }

    //Check Username Before update
    public static function checkUsernameUpdate($user_name, $id){
        $count = DB::table('users')
            ->where('username','=', $user_name)
            ->where('id', '<>', $id)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check User Number Before Update
    public static function checkUserNumberUpdate($user_number, $id){
        $count = DB::table('users')
            ->where('user_no','=', $user_number)
            ->where('id', '<>', $id)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check User Email Before Update
    public static function checkUserEmailBeforeUpdate($email, $id){
        $count = DB::table('users')
            ->where('email','=', $email)
            ->where('id', '<>', $id)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
}