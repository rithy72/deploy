<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 1:49 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


class DateTimeLogic
{

    private const TIME_ZONE = "Asia/Bangkok";
    public const DB_DATE_TIME_FORMAT = "Y-m-d H:i:s";
    public const SHOW_DATE_TIME_FORMAT = "d/m/Y H:i:s";

    //Instance Method
    public static function Instance(){
        return new DateTimeLogic();
    }

    //Get Current Date Method
    public function GetCurrentDateTime($date_time_format){
        date_default_timezone_set(DateTimeLogic::TIME_ZONE);
        $date = date($date_time_format, time());
        return $date;
    }

    //Add Date to Current Date
    public function AddDaysToCurrentDateDBFormat($date_amount, $date_time_format){
        $date = $this->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT);
        $newDate = date($date_time_format, strtotime('+'.intval($date_amount).' days',strtotime($date))) ;
        return $newDate;
    }
}