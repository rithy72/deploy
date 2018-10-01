<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 8:37 PM
 */

namespace App\Http\Controllers\Base\Model;


class InvoiceItemModel
{
    public $id;
    public $invoice_id;
    public $item_type_id;
    public $item_type_name;
    public $first_feature;
    public $second_feature;
    public $third_feature;
    public $fourth_feature;
    public $status;
    public $display_status;
    public $delete_able;
    public $out_date;
    public $user_id;
    public $in_date;
    public $in_user;
    public $sale_price;

    public static function Instance(){
        return new InvoiceItemModel();
    }
}