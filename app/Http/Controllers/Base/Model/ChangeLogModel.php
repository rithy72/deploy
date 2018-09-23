<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/20/2018
 * Time: 10:41 PM
 */

namespace App\Http\Controllers\Base\Model;


class ChangeLogModel
{
    public $action;
    public $showName;
    public $oldValue;
    public $newValue;

    public static function Instance(){
        return new ChangeLogModel();
    }
}