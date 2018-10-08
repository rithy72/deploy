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
use App\Http\Controllers\Base\Model\Enum\UserSearchOptionEnum;
use App\Http\Controllers\Base\Model\Other\PaginateModel;
use App\Http\Controllers\Base\Model\UserModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class UserLogic extends SecureLogic
{

    //User Logic Instance
    public static function Instance(){
        return new UserLogic();
    }

    //Check Username Before Insert
    private function checkUsernameInsert($user_name){
        $count = DB::table('users')
            ->where('email','=', $user_name)->count();
        if ($count > 0) return false;
        return true;
    }
    //Check User Number Before Insert
    private function checkUserNumberInsert($user_number){
        $count = DB::table('users')
            ->where('user_no','=', $user_number)->count();
        if ($count > 0) return false;
        return true;
    }

    //Check Username Before update
    private function checkUsernameUpdate($user_name, $id){
        $count = DB::table('users')
            ->where('email','=', $user_name)
            ->where('id', '<>', $id)
            ->count();
        if ($count > 0) return false;
        return true;
    }
    //Check User Number Before Update
    private function checkUserNumberUpdate($user_number, $id){
        $count = DB::table('users')
            ->where('user_no','=', $user_number)
            ->where('id', '<>', $id)
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
            AuditGroup::USERNAME, $old_model->email, $user_model->email, UserActionEnum::INSERT, $chang_log_array);
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
        $validateUsername = $this->checkUsernameInsert($user->email);
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
                'password' => bcrypt($user->password),
                'role' => strtolower($user->role),
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
        $validateUsername = $this->checkUsernameUpdate($user->email, $id);
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
            ->update([
                'user_no' => $user->user_no,
                'name' => $user->name,
                'phone_number' => $user->phone_number,
                'email' => $user->email,
                'role' => strtolower($user->role),
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

    //Reset Password
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

    //Admin Reset User Password
    public function ResetUserPassword($new_password, $user_id){
        $userObj = $this->Find($user_id);
        //Reset Password, if can
        DB::table('users')
            ->where('id','=', $user_id)
            ->update([
                'password' => bcrypt($new_password),
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
                return $query->where('status', '=', $status);
            })
            ->where('id', '<>', Auth::id())
            ->paginate($page_size);
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
        $group = AuditGroup::USER;
        $dateInstance = DateTimeLogic::Instance();
        //
        $userObj = $this->Find($user_id);
        //
        $fromDate = (empty($from_date)) ?
            $dateInstance->FormatDatTime($userObj->created_date, 'Y-m-d 00:00:00') :
            $dateInstance->FormatDatTime($from_date, 'Y-m-d 00:00:00');
        $toDate = (empty($to_date)) ?
            $dateInstance->AddDaysToCurrentDateDBFormat(90, 'Y-m-d 00:00:00') :
            $dateInstance->FormatDatTime($to_date, 'Y-m-d 00:00:00');
        $allowGroup = array(AuditGroup::USER);
        //
        $getResult = DB::table('user_record')
            ->select(
                'user_record.id','user_record.parent_id','user_record.display_audit','user_record.description',
                'user_record.change_log','user_record.date_time','users.name', 'users.user_no'
            )
            ->join('users','user_record.user_id','=','users.id')
            ->where('user_record.parent_id','=', intval($user_id))
            //->whereBetween('user_record.date_time', array($from_date, $to_date))
            ->whereIn('user_record.audit_group', $allowGroup)
            //When user want to filter by group and action
            ->when(!empty($group), function ($query) use ($action, $group, $allowGroup){
                if (!in_array($group, $allowGroup)) return $query;
                //
                if (!empty($action)){
                    return $query->where('user_record.audit_group', '=', $group)
                        ->where('user_record.action', '=', $action);
                }
                //
                return $query->where('user_record.audit_group', '=', $group);
            })
            //When user has date range
            ->whereBetween('user_record.date_time', array($fromDate, $toDate))
            ->orderByRaw('user_record.date_time')
            ->paginate($page_size);
        //Append
        $getResult->appends(Input::except('page'));

        //return $fromDate."-".$toDate;
        return $getResult;
    }

    //User Audit Trail
    public function UserAuditTrial($from_date, $to_date, $group, $action, $user_id, $page_size){
        $dateInstance = DateTimeLogic::Instance();
        $startOfUsing = DailyReportLogic::Instance()->GetStartDayOfUsing();
        //
        $fromDate = (empty($from_date)) ?
            $dateInstance->FormatDatTime($startOfUsing, 'Y-m-d 00:00:00') :
            $dateInstance->FormatDatTime($from_date, 'Y-m-d 00:00:00');
        $toDate = (empty($to_date)) ?
            $dateInstance->AddDaysToCurrentDateDBFormat(90, 'Y-m-d 00:00:00') :
            $dateInstance->FormatDatTime($to_date, 'Y-m-d 00:00:00');
        $allowGroup = array(AuditGroup::ITEM, AuditGroup::INVOICE, AuditGroup::USER, AuditGroup::SECURITY, AuditGroup::ITEM_TYPE);
        //
        $getResult = DB::table('user_record')
            ->select(
                'user_record.id','user_record.parent_id','user_record.display_audit','user_record.description',
                'user_record.change_log','user_record.date_time','users.name'
            )
            ->join('users','user_record.user_id','=','users.id')
            //->whereBetween('user_record.date_time', array($from_date, $to_date))
            ->where('user_record.user_id','=', $user_id)
            //When user want to filter by group and action
            ->when(!empty($group), function ($query) use ($action, $group, $allowGroup){
                if (!in_array($group, $allowGroup)) return $query;
                //
                if (!empty($action)){
                    return $query->where('user_record.audit_group', '=', $group)
                        ->where('user_record.action', '=', $action);
                }
                //
                return $query->where('user_record.audit_group', '=', $group);
            })
            //When user has date range
            ->whereBetween('user_record.date_time', array($fromDate, $toDate))
            ->orderByRaw('user_record.date_time')
            ->paginate($page_size);
        //Append
        $getResult->appends(Input::except('page'));

        return $getResult;
    }

}