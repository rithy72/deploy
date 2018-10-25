<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/25/2018
 * Time: 8:13 PM
 */

namespace App\Http\Controllers\Base\Model\NotificationModel;


class NotificationData
{
    public $id;
    public $email;
    public $messenger;
    public $telegram;
    public $notify;
    //

    public function FinalizeObject($object){
        $model = NotificationData::Instance();
        $model->id = $object->id;
        $model->email = $object->email;
        $model->messenger = (isset($object->messenger)) ? $object->messenger : "";
        $model->telegram = (isset($object->telegram)) ? $object->telegram : "";
        $model->notify = (is_string($object->notify)) ? json_decode($object->notify) : $object->notify;

        return $model;
    }
    //

    public static function Instance(){
        return new NotificationData();
    }
}