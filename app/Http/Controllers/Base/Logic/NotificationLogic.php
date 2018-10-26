<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/25/2018
 * Time: 8:12 PM
 */

namespace App\Http\Controllers\Base\Logic;

use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationLogic
{
    //Instance
    public static function Instance(){
        return new NotificationLogic();
    }

    public function GetAdminEmail(){
        $result = DB::table('users')->select('email')
            ->where('role','=', UserRoleEnum::ADMIN)->get();
        //
        $mails = array();
        foreach ($result as $item){
            if (!empty($item)){
                array_push($mails, $item->email);
            }
        }
        //
        return $mails;
    }

    //Backup Database
    public function SendBackupFile(){
        $model = NotificationLogic::Instance()->GetAdminEmail();
        $appname = config('app.name');
        $dir = storage_path('app');
        $complete = $dir.'\/'.$appname;
        $files = scandir($complete, SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        $body = 'This is the back up data of: '.DateTimeLogic::Instance()
                ->GetCurrentDateTime(DateTimeLogic::SHOW_DATE_TIME_FORMAT);
        //
        foreach ($model as $mail){
            Mail::raw($body, function ($email) use ($complete, $newest_file, $mail){
                $email
                    ->to($mail)
                    ->attach($complete.'\/'.$newest_file)
                    ->subject('Database Backup');
            });
        }
    }

    //Invoice Transaction
    public function InvoiceTransactionAlert(){

    }
}