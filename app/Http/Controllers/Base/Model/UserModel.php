<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/2/2018
 * Time: 10:05 PM
 */

namespace App\Http\Controllers\Base\Model;


class UserModel
{
    public $id;
    public $user_number;
    public $full_name;
    public $phone_number;
    public $note;
    public $role;
    public $username;
    public $password;
    public $status;
    public $display_status;
    public $delete_able;

    public static function Instance(){
        return new UserModel();
    }

    public static function FinalizeObject(UserModel $user_object){
        if (empty($user_object) || $user_object == null)
            return UserModel::Instance();
        //
        $userModel = UserModel::Instance();
        //TODO: Return Finalize User Object
    }
}