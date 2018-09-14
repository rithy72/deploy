<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 10:46 PM
 */

namespace App\Http\Controllers\Base\Model;


use App\Http\Controllers\Base\Logic\DailyReportLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use Illuminate\Support\Facades\DB;

class DailyReportModel
{
    public $in_items;
    public $out_items;
    public $expense;
    public $income;

    //Instance Class
    public static function Instance(){
        return new DailyReportLogic();
    }
}