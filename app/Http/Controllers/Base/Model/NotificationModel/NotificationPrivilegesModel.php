<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/25/2018
 * Time: 8:13 PM
 */

namespace App\Http\Controllers\Base\Model\NotificationModel;


class NotificationPrivilegesModel
{
    public $backup_data = false;
    public $invoice  = [
        'insert' => false, 'edit' => false, 'payment' => false, 'took' => false
    ];
    public $item = [
        'add' => false, 'depreciation' => false, 'sale' => false
    ];
    //

    public function FinalizeModel($model){
        $privilegeModel = NotificationPrivilegesModel::Instance();
        $privilegeModel->backup_data =
            (isset($model->backup_data) && !empty($model->backup_data)) ? (boolean)$model->backup_data : false;
        //
        $invoicePrivilege = (array)$model->invoice;
        foreach ($privilegeModel->invoice as $key => $item){
            $privilegeModel->invoice[$key] =
                (isset($invoicePrivilege[$key]) || !empty($invoicePrivilege[$key])) ? (boolean)$invoicePrivilege[$key] : false;
        }
        //
        $itemPrivilege = (array)$model->item;
        foreach ($privilegeModel->item as $key => $item){
            $privilegeModel->item[$key] =
                (isset($itemPrivilege[$key]) || !empty($itemPrivilege[$key])) ? (boolean)$itemPrivilege[$key] : false;
        }

        return $privilegeModel;
    }
    //

    public static function Instance(){
        return new NotificationPrivilegesModel();
    }

}