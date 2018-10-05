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
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
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

    //Check if user can be delete
    public function checkIfUserCanbeDelete($id){
        $count = DB::table('user_record')
            ->where('user_id','=', $id)
            ->whereIn('audit_group', array(
                AuditGroup::INVOICE,
                AuditGroup::ITEM,
                AuditGroup::ITEM_TYPE,
                AuditGroup::USER
            ))
            ->count();
        if ($count > 0) return false;
        return true;
    }

    //Find User
    public function Find($user_id){
        $userObj = DB::table('users')->where('id','=', $user_id)->first();
        //
        $returnModel = UserModel::FinalizeObject($userObj);
        //
        return $returnModel;
    }

    //Insert ChangeLog
    public function InsertChangeLog(UserModel $user_model,UserModel $old_model, $chang_log_array){
        $userAudit = UserAuditLogic::Instance();
        //User Number
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USER_NUMBER, $old_model->user_no, $user_model->user_no, UserActionEnum::INSERT, $chang_log_array);
        //Name
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USER_FULLNAME, $old_model->name, $user_model->name, UserActionEnum::INSERT, $chang_log_array);
        //Phone
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::PHONE, $old_model->phone_number, $user_model->phone_number, UserActionEnum::INSERT, $chang_log_array);
        //Username
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::PHONE, $old_model->phone_number, $user_model->phone_number, UserActionEnum::INSERT, $chang_log_array);
        //Note
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::NOTE, $old_model->note, $user_model->note, UserActionEnum::INSERT, $chang_log_array);
        //Role
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USER_ROLE, $old_model->display_role, $user_model->display_role, UserActionEnum::INSERT, $chang_log_array);

        //
        return $chang_log_array;
    }

    //Add New User Logic
    public function CreateUser($user){
        $validate = $this->checkBeforeInsert($user->email, $user->user_no);
        $changeLogArray = array();
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
        //Get User Object
        $userObj = $this->Find($userId);
        //Change Log
        $changeLogArray = $this->InsertChangeLog($userObj, $userObj, $changeLogArray);
        //User Audit Trail
        UserAuditLogic::Instance()->UserOnUserAction(
            $userId, UserActionEnum::INSERT, $userObj->user_no."-".$userObj->name, $changeLogArray);

        return $userObj;
    }

    //Update User Info
    public function UpdateUser($user, $id){
        $userOldObj = $this->Find($id);
        $validate = $this->checkBeforeUpdate($user->email, $user->user_no, $id);
        $changeLogArray = array();
        //
        if (!$validate) return false;
        $user->name = (!empty($user->name)) ? $user->name : $userOldObj->name;
        $user->user_no = ($userOldObj->delete_able) ? $user->user_no :$userOldObj->user_no;
        //
        DB::table('users')
            ->update([
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
        //New Object
        $newUserObj = $this->Find($id);
        //Change Log
        $changeLogArray = $this->InsertChangeLog($newUserObj, $userOldObj, $changeLogArray);
        //User Audit Trail
        UserAuditLogic::Instance()->UserOnUserAction(
            $id, UserActionEnum::UPDATE, $newUserObj->user_no."-".$newUserObj->name, $changeLogArray);

        return $newUserObj;
    }

    //Delete
    public function Delete($id){
        $userObj = $this->Find($id);
        //Check if can delete
        if ($userObj->delete_able == false) return false;
        //Delete
        DB::table('users')->where('id','=', $id)->delete();
        //User Audit
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::DELETE, $description, []);
        //
        return true;
    }

    //Deactivate
    public function Deactivate($id){
        $userObj = $this->Find($id);
        //
        DB::table('users')
            ->where('id','=', $id)
            ->update([
               'status' => false,
               'password' => null,
               'last_update_date' => DateTimeLogic::Instance()
                   ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id()
            ]);
        //User Audit
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::DEACTIVATE, $description, []);
    }

    //Activate
    public function Activate($new_password, $id){
        $userObj = $this->Find($id);
        //
        DB::table('users')
            ->where('id','=', $id)
            ->update([
                'status' => true,
                'password' => bcrypt($new_password),
                'last_update_date' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id()
            ]);
        //User Audit
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::ACTIVATE, $description, []);
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::CHANGE_PASSWORD, $description, []);
    }

    //Reset Password()
    public function ResetPassword($username, $old_password, $new_password, $id){
        $userObj = $this->Find($id);
        //Check, can not reset
        if ($username != $userObj->email || bcrypt($old_password) != $userObj->password) return false;
        //Reset Password, if can
        DB::table('users')
            ->where('id','=', $id)
            ->update([
                'password' => bcrypt($new_password),
                'last_update_date' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id()
            ]);
        //User Audit
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::CHANGE_PASSWORD, $description, []);

        return true;
    }

    //Filter Search


}