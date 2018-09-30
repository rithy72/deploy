<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 8:37 PM
 */

namespace App\Http\Controllers\Base\Model;


class InvoiceInfoModel
{
    public $id;
    public $display_id;
    public $customer_name;
    public $customer_phone;
    public $created_date;
    public $expire_date;
    public $is_late;
    public $late_days;
    public $user_id;
    public $user_full_name;
    public $status;
    public $display_status;
    public $grand_total;
    public $paid;
    public $remain;
    public $interests_rate;
    public $interests_value;
    public $final_date_time;
    public $final_action_user;

    public static function Instance(){
        return new InvoiceInfoModel();
    }
}