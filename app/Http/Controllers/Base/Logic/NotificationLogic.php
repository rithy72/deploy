<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/25/2018
 * Time: 8:12 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Model\NotificationModel\NotificationData;
use App\Http\Controllers\Base\Model\NotificationModel\NotificationPrivilegesModel;
use Illuminate\Support\Facades\DB;

class NotificationLogic
{
    //Instance
    public static function Instance(){
        return new NotificationLogic();
    }

    //Change Log
    private function ChangeLog(){

    }

    //Insert
    public function Insert(NotificationData $model){
        if (empty($model->email)) return "401";
        //
        $model->notify = NotificationPrivilegesModel::Instance()->FinalizeModel($model->notify);
        //
        $insertId = DB::table('notification')
            ->insertGetId([
                'email' => $model->email,
                'messenger' => $model->messenger ?? "",
                'telegram' => $model->telegram ?? "",
                'notify' => json_encode($model->notify)
            ]);
        //
        $model->id = $insertId;
        return $model;
    }

    //Update
    public function Edit(NotificationData $model, $id){

    }
}