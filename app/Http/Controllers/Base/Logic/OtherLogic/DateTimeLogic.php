<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 1:49 PM
 */

namespace App\Http\Controllers\Base\Logic\OtherLogic;


use DateTime;

class DateTimeLogic
{

    private const TIME_ZONE = "Asia/Bangkok";
    public const DB_DATE_TIME_FORMAT = "Y-m-d H:i:s";
    public const SHOW_DATE_TIME_FORMAT = "d/m/Y H:i:s";
    public const DB_DATE_FORMAT = "Y-m-d";
    public const SHOW_DATE_FORMAT = "d/m/Y";

    //Instance Method
    public static function Instance(){
        return new DateTimeLogic();
    }

    //Format Date String
    public function FormatDatTime($date_string, $format){
        $finalDate = date($format, strtotime($date_string));
        return $finalDate;
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

    //Check Late
    public function CheckLate($date_param){
        $class = new \stdClass();
        $today = new DateTime(DateTimeLogic::GetCurrentDateTime(DateTimeLogic::DB_DATE_FORMAT));
        $dateParam = new DateTime($this->FormatDatTime($date_param, DateTimeLogic::DB_DATE_FORMAT));
        //
        $result = $today->diff($dateParam)->days;
        //
        if ($dateParam < $today){
            $class->is_late = true;
            $class->late_days = $result;
        }elseif ($dateParam > $today){
            $class->is_late = false;
            $class->late_days = 0;
        }
        //
        return $class;
    }
}