<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\OtherLogic\SecureLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use App\Http\Controllers\Base\Model\UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Find User
    public function find($id){
        $userObj = UserLogic::Instance()->Find($id);
        //
        $userObj->password = "-";
        //
        $returnModel = ReturnModel::Instance();
        $returnModel->status = "200";
        $returnModel->data = $userObj;
        return json_encode($returnModel);
    }

    //Filter Search
    public function search(Request $request){
        $searchOption = $request->input('search_option','');
        $search = $request->input('search','');
        $status = $request->input('status','');
        $pageSize = $request->input('page_size',10);
        //
        $result = UserLogic::Instance()->FilterSearch($searchOption, $search, $status, $pageSize);
        //
        $returnModel = ReturnModel::Instance();
        $returnModel->status = "200";
        $returnModel->data = $result;
        return json_encode($returnModel);
    }

    //User Edit History
    public function user_history(Request $request, $id){
        $fromDate = $request->input('from_date','');
        $toDate = $request->input('to_date','');
        $action = $request->input('action','');
        $pageSize = $request->input('page_size',10);
        //
        $result = UserLogic::Instance()->UserHistory($fromDate, $toDate, $action, $id, $pageSize);
        //
        $returnModel = ReturnModel::Instance();
        $returnModel->status = "200";
        $returnModel->data = $result;
        return json_encode($returnModel);
    }

    //User Action
    public function user_action(Request $request, $id){
        $fromDate = $request->input('from_date','');
        $toDate = $request->input('to_date','');
        $group = $request->input('group','');
        $action = $request->input('action','');
        $pageSize = $request->input('page_size',10);
        //
        $result = UserLogic::Instance()->UserAuditTrial($fromDate, $toDate, $group, $action, $id, $pageSize);
        //
        $returnModel = ReturnModel::Instance();
        $returnModel->status = "200";
        $returnModel->data = $result;
        return json_encode($returnModel);
    }

    //Create User
    public function create(Request $request){
        $returnModel = ReturnModel::Instance();
        $adminPassword = $request->admin_password;
        $checkAdmin = SecureLogic::Instance()->CheckAdminPassword($adminPassword);
        //
        if ($checkAdmin){
            //When user is actually admin, and the password is right
            $userModel = UserModel::Instance();
            $userInfo = (object)$request->user_info;
            $userModel->user_no = $userInfo->user_no;
            $userModel->name = $userInfo->name;
            $userModel->phone_number = $userInfo->phone_number;
            $userModel->note = $userInfo->note;
            //$userModel->role = $userInfo->role;
            $userModel->email = trim($userInfo->email);
            $userModel->password = trim($userInfo->password);
            //
            $insertResult = UserLogic::Instance()->CreateUser($userModel);
            //
            if (is_object($insertResult)){
                //Insert Success
                $returnModel->status = "200";
                $returnModel->data = $insertResult;
            }elseif ($insertResult == "300"){
                //Duplicate Username
                $returnModel->status = $insertResult;
                $returnModel->data = "Duplicate Username";
            }elseif ($insertResult == "301"){
                //Duplicate User Number
                $returnModel->status = $insertResult;
                $returnModel->data = "Duplicate User Number";
            }elseif ($insertResult == "400"){
                //Lack Information
                $returnModel->status = $insertResult;
                $returnModel->data = "Lack Information";
            }
        }else{
            //When user user maybe not admin or the password is wrong
            $returnModel->status = "401";
            $returnModel->data = "User not Admin or invalid password";
        }

        return json_encode($returnModel);
    }

    //Edit User
    public function edit(Request $request, $user_id){
        $returnModel = ReturnModel::Instance();
        $adminPassword = $request->admin_password;
        $checkAdmin = SecureLogic::Instance()->CheckAdminPassword($adminPassword);
        //
        if ($checkAdmin){
            //When user is actually admin, and the password is right
            $userModel = UserModel::Instance();
            $userInfo = (object)$request->user_info;
            $userModel->user_no = $userInfo->user_no;
            $userModel->name = $userInfo->name;
            $userModel->phone_number = $userInfo->phone_number;
            $userModel->note = $userInfo->note;
            $userModel->email = trim($userInfo->email);
            //
            $updateResult = UserLogic::Instance()->UpdateUser($userModel, $user_id);
            //
            if (is_object($updateResult)){
                //Insert Success
                if ($user_id == Auth::id()){
                    $returnModel->status = "201";
                    $returnModel->data = "Action on logged in user, must login again";
                }else{
                    $returnModel->status = "200";
                    $returnModel->data = $updateResult;
                }
            }elseif ($updateResult == "300"){
                //Duplicate Username
                $returnModel->status = $updateResult;
                $returnModel->data = "Duplicate Username";
            }elseif ($updateResult == "301"){
                //Duplicate User Number
                $returnModel->status = $updateResult;
                $returnModel->data = "Duplicate User Number";
            }
        }else{
            //When user user maybe not admin or the password is wrong
            $returnModel->status = "401";
            $returnModel->data = "User not Admin or invalid password";
        }

        if ($returnModel->status == "201") Auth::logout();
        return json_encode($returnModel);
    }

    //Delete User
    public function delete(Request $request, $id){
        $returnModel = ReturnModel::Instance();
        $adminPassword = $request->admin_password;
        $checkAdmin = SecureLogic::Instance()->CheckAdminPassword($adminPassword);
        //
        if ($checkAdmin){
            $deleteResult = UserLogic::Instance()->Delete($id);
            //
            if ($deleteResult){
                //Success
                if ($id == Auth::id()){
                    $returnModel->status = "201";
                    $returnModel->data = "Action on logged in user, must login again";
                }else{
                    $returnModel->status = "200";
                    $returnModel->data = "User successful deleted";
                }
            }else{
                //Can not delete
                $returnModel->status = "400";
                $returnModel->data = "Can not delete this user";
            }
        }else{
            //When user user maybe not admin or the password is wrong
            $returnModel->status = "401";
            $returnModel->data = "User not Admin or invalid password";
        }

        //
        if ($returnModel->status == "201") Auth::logout();
        return json_encode($returnModel);
    }

    //Deactivate User
    public function deactivateUser(Request $request, $id){
        $returnModel = ReturnModel::Instance();
        $adminPassword = $request->admin_password;
        $checkAdmin = SecureLogic::Instance()->CheckAdminPassword($adminPassword);
        //
        if ($checkAdmin){
            UserLogic::Instance()->Deactivate($id);
            //
            //Success
            if ($id == Auth::id()){
                $returnModel->status = "201";
                $returnModel->data = "Action on logged in user, must login again";
            }else{
                $returnModel->status = "200";
                $returnModel->data = "User successful deactivate";
            }
        }else{
            //When user user maybe not admin or the password is wrong
            $returnModel->status = "401";
            $returnModel->data = "User not Admin or invalid password";
        }

        //
        if ($returnModel->status == "201") Auth::logout();
        return json_encode($returnModel);
    }

    //Activate User
    public function activateUser(Request $request, $id){
        $returnModel = ReturnModel::Instance();
        $adminPassword = $request->admin_password;
        $checkAdmin = SecureLogic::Instance()->CheckAdminPassword($adminPassword);
        //
        if ($checkAdmin){
            $userInfo = (object)$request->user_info;
            $newPassword = trim($userInfo->new_password);
            UserLogic::Instance()->Activate($newPassword, $id);
            //
            //Success
            if ($id == Auth::id()){
                $returnModel->status = "201";
                $returnModel->data = "Action on logged in user, must login again";
            }else{
                $returnModel->status = "200";
                $returnModel->data = "User successful Activate";
            }
        }else{
            //When user user maybe not admin or the password is wrong
            $returnModel->status = "401";
            $returnModel->data = "User not Admin or invalid password";
        }
        //
        if ($returnModel->status == "201") Auth::logout();
        return json_encode($returnModel);
    }

    //Reset Password
    public function resetOwnPassword(Request $request){

    }

    //Admin Reset Other User Password
    public function adminReset(Request $request, $id){
        $returnModel = ReturnModel::Instance();
        $adminPassword = $request->admin_password;
        $checkAdmin = SecureLogic::Instance()->CheckAdminPassword($adminPassword);
        //
        if ($checkAdmin){
            $userInfo = (object)$request->user_info;
            $newPassword = trim($userInfo->new_password);
            UserLogic::Instance()->ResetUserPassword($newPassword, $id);
            //
            //Success
            if ($id == Auth::id()){
                $returnModel->status = "201";
                $returnModel->data = "Action on logged in user, must login again";
            }else{
                $returnModel->status = "200";
                $returnModel->data = "User successful reset password";
            }
        }else{
            //When user user maybe not admin or the password is wrong
            $returnModel->status = "401";
            $returnModel->data = "User not Admin or invalid password";
        }
        //
        //if ($returnModel->status == "201") Auth::logout();
        return json_encode($returnModel);
    }

}
