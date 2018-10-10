<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/10/2018
 * Time: 3:52 PM
 */

namespace App\Http\Controllers\Base\Model;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;

class AuditTrailModel
{
    public $id;
    public $parent_id;
    public $display_audit;
    public $description;
    public $change_log;
    public $date_time;
    public $name;

    public static function FinalizeModel($model){
        $dateInstance = DateTimeLogic::Instance();
        //
        $auditModel = AuditTrailModel::Instance();
        $auditModel->id = $model->id;
        $auditModel->parent_id = $model->parent_id;
        $auditModel->display_audit = $model->display_audit;
        $auditModel->description = $model->description;
        $auditModel->change_log = $model->change_log;
        $auditModel->date_time = $dateInstance
            ->FormatDatTime($model->date_time, DateTimeLogic::SHOW_DATE_TIME_FORMAT);
        $auditModel->name = $model->user_no." - ".$model->name;

        return $auditModel;
    }

    public static function Instance(){
        return new AuditTrailModel();
    }
}