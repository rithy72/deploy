<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 8:45 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Base\Model\Enum\UserSearchOptionEnum;
use App\Http\Controllers\Base\Model\Other\PaginateModel;
use App\Http\Controllers\Base\Model\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;

class UserLogic
{

    //User Logic Instance
    public static function Instance(){
        return new UserLogic();
    }

    //Check User Number Before Insert
    private function checkUserNumberInsert($user_number){
        $count = DB::table('users')
            ->where('user_no','=', $user_number)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check Username Before Insert
    private function checkUsernameInsert($user_number){
        $count = DB::table('users')
            ->where('username','=', $user_number)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }

    //Check Username Before update
    private function checkUsernameUpdate($user_name, $id){
        $count = DB::table('users')
            ->where('username','=', $user_name)
            ->where('id', '<>', $id)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check User Number Before Update
    private function checkUserNumberUpdate($user_number, $id){
        $count = DB::table('users')
            ->where('user_no','=', $user_number)
            ->where('id', '<>', $id)
            ->where('deleted','=', false)
            ->count();
        if ($count > 0) return false;
        return true;
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
        $userObj = DB::table('users')
            ->where('id','=', $user_id)
            ->where('deleted','=', false)
            ->first();
        //
        $returnModel = UserModel::FinalizeObject($userObj);
        //
        return $returnModel;
    }

    //Insert ChangeLog
    public function ChangeLogRecord(UserModel $user_model, UserModel $old_model, $chang_log_array, $flag){
        $userAudit = UserAuditLogic::Instance();
        //User Number
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USER_NUMBER, $old_model->user_no, $user_model->user_no, $flag, $chang_log_array);
        //Name
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USER_FULLNAME, $old_model->name, $user_model->name, $flag, $chang_log_array);
        //Phone
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::PHONE, $old_model->phone_number, $user_model->phone_number, $flag, $chang_log_array);
        //Username
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USERNAME, $old_model->email, $user_model->email, $flag, $chang_log_array);
        //Note
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::NOTE, $old_model->note, $user_model->note, $flag, $chang_log_array);
        //Role
        $chang_log_array = $userAudit->CompareField(
            AuditGroup::USER_ROLE, strtolower($old_model->display_role), strtolower($user_model->display_role),
            $flag, $chang_log_array);

        //
        return $chang_log_array;
    }

    //Add New User Logic
    public function CreateUser($user){
        $validateUsername = $this->checkUsernameInsert($user->username);
        $validateUserNumber = $this->checkUserNumberInsert($user->user_no);
        $changeLogArray = array();
        //
        if (empty($user->name)) return "400";
        //
        if (!$validateUsername) return "300";
        if (!$validateUserNumber) return "301";
        //
        $userId = DB::table('users')
            ->insertGetId([
                'user_no' => $user->user_no,
                'name' => $user->name,
                'phone_number' => $user->phone_number,
                'email' => $user->email,
                'username' => $user->username,
                'password' => bcrypt($user->password),
                'role' => strtolower(UserRoleEnum::USER),
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
        $changeLogArray = $this->ChangeLogRecord($userObj, $userObj, $changeLogArray, UserActionEnum::INSERT);
        //User Audit Trail
        UserAuditLogic::Instance()->UserOnUserAction(
            $userId, UserActionEnum::INSERT, $userObj->user_no."-".$userObj->name, $changeLogArray);

        $userObj->password = "-";
        return $userObj;
    }

    //Update User Info
    public function UpdateUser($user, $id){
        $userOldObj = $this->Find($id);
        $userRole = UserRoleEnum::USER;
        if ($userOldObj->role == UserRoleEnum::ADMIN) $userRole = UserRoleEnum::ADMIN;

        $validateUsername = $this->checkUsernameUpdate($user->username, $id);
        $validateUserNumber = $this->checkUserNumberUpdate($user->user_no, $id);
        $changeLogArray = array();
        //
        if (!$validateUsername) return "300";
        if (!$validateUserNumber) return "301";
        //
        $user->name = (!empty($user->name)) ? $user->name : $userOldObj->name;
        $user->user_no = ($userOldObj->delete_able && !empty($user->user_no)) ? $user->user_no :$userOldObj->user_no;
        $user->role = (!empty($user->role)) ? $user->role : $userOldObj->role;
        //
        DB::table('users')
            ->where('id','=', $id)
            ->update([
                'user_no' => $user->user_no,
                'name' => $user->name,
                'phone_number' => $user->phone_number,
                'email' => $user->email,
                'username' => $user->username,
                'role' => strtolower($userRole),
                'note' => $user->note,
                'delete_able' => true,
                'last_update_date' =>
                    DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id(),
                'just_updated' => true
            ]);
        //New Object
        $newUserObj = $this->Find($id);
        //Change Log
        $changeLogArray = $this->ChangeLogRecord($newUserObj, $userOldObj, $changeLogArray, UserActionEnum::UPDATE);
        //User Audit Trail
        UserAuditLogic::Instance()->UserOnUserAction(
            $id, UserActionEnum::UPDATE, $newUserObj->user_no."-".$newUserObj->name, $changeLogArray);

        $newUserObj->password = "-";
        return $newUserObj;
    }

    //Delete
    public function Delete($id){
        $userObj = $this->Find($id);
        //Check if can delete
        if ($userObj->delete_able == false) return false;
        //Delete
        DB::table('users')
            ->where('id','=', $id)
            ->update([
                'deleted' => true,
                'email' => null,
                'password' => null,
                'just_updated' => true
            ]);
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
                'last_update_by' => Auth::id(),
                'just_updated' => true
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
                'password' => Hash::make(trim($new_password)),
                'last_update_date' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id()
            ]);
        //User Audit
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::ACTIVATE, $description, []);
        UserAuditLogic::Instance()->UserOnUserAction($id, UserActionEnum::CHANGE_PASSWORD, $description, []);
    }

    //Reset Password
    public function UserPreps($email, $username){
        $check = DB::table('password_resets')->where('email','=', trim($email))->first();
        $dateInstance = DateTimeLogic::Instance();
        $randString = Str::random(60);
        //
        if ($check == null){
            //Insert New Token
            DB::table('password_resets')->insert([
                'username' => trim($username),
                'email' => trim($email),
                'token' => Hash::make($randString),
                'created_at' => $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
            ]);
        }else{
            DB::table('password_resets')
                ->where('email','=', trim($email))
                ->where('username','=', trim($username))
                ->update([
                    'token' => Hash::make($randString),
                    'created_at' => $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT)
                ]);
        }
        //
        DB::table('users')
            ->where('id','=', Auth::id())
            ->update([
                "just_updated" => false,
                'remember_token' => $randString
            ]);
        return $randString;
    }

    //Admin Reset User Password
    public function ResetUserPassword($new_password, $user_id){
        $userObj = $this->Find($user_id);
        //Reset Password, if can
        DB::table('users')
            ->where('id','=', $user_id)
            ->update([
                'password' => Hash::make(trim($new_password)),
                'last_update_date' => DateTimeLogic::Instance()
                    ->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT),
                'last_update_by' => Auth::id(),
                'just_updated' => true
            ]);
        //User Audit
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($user_id, UserActionEnum::CHANGE_PASSWORD, $description, []);

        return true;
    }

    //Filter Search
    //Search Option: User Number, Name, Phone
    public function FilterSearch($searchOption, $search, $status, $page_size){
        //
        $usersResult = DB::table('users')
            //When user search
            ->when((!empty($searchOption) && !empty($search)), function ($query) use ($searchOption, $search){
                $searchColumn = UserSearchOptionEnum::UserSearchColumns[$searchOption];
                return $query->where($searchColumn, '=', $search);
            })
            //When user want status
            ->when(!empty($status), function ($query) use ($status){
                $finalStatus = GeneralStatus::FinalizeStatus($status);
                return $query->where('status', '=', $finalStatus);
            })
            ->where('id', '<>', Auth::id())
            ->where('deleted','=', false)
            ->paginate($page_size);
        //
        $usersResult->appends(Input::except('page'));
        //
        $returnArray = array();
        foreach ($usersResult as $user){
            $model = UserModel::FinalizeObject((object)$user);
            $model->password = "-";
            array_push($returnArray, $model);
        }
        //
        $newModel = PaginateModel::Instance()->FinalizePaginateModel($returnArray, $usersResult);

        return $newModel;
    }

    //User History
    //Action create, update, deactivate, activate, reset password
    public function UserHistory($from_date, $to_date, $action, $user_id, $page_size){
        $allowGroup = array(AuditGroup::USER);
        $getResult = UserAuditLogic::Instance()
            ->search($from_date, $to_date, $allowGroup, AuditGroup::USER, $action, "", $user_id, $page_size);

        return $getResult;
    }

    //User Audit Trail
    public function UserAuditTrial($from_date, $to_date, $group, $action, $user_id, $page_size){
        $getResult = UserAuditLogic::Instance()
            ->search($from_date, $to_date, "", $group, $action, $user_id, "", $page_size);

        return $getResult;
    }

}