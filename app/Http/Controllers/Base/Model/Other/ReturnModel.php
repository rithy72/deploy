<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/14/2018
 * Time: 9:00 PM
 */

namespace App\Http\Controllers\Base\Model\Other;


class ReturnModel
{
    public $status;
    public $data;

    public static function Instance(){
        return new ReturnModel();
    }
}