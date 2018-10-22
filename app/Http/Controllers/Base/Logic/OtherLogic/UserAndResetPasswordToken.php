<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/22/2018
 * Time: 8:26 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


use App\Http\Controllers\Base\Logic\UserLogic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAndResetPasswordToken
{
    //Instance
    public static function Instance(){
        return new UserAndResetPasswordToken();
    }

    //Reset Password Token
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
            //Update Token
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

    //Clear All Token
    public function ClearToken(){
        $userObj = UserLogic::Instance()->Find(Auth::id());
        //Remove Remember Token
        DB::table('users')
            ->where('id','=', Auth::id())
            ->update([
                'remember_token' => null
            ]);
        //Remove Reset Password Token
        DB::table('password_resets')
            ->where('username','=', $userObj->username)
            ->orWhere('username','=', null)
            ->delete();
        //
    }

}