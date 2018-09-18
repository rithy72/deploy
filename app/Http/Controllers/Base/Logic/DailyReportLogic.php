<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 10:44 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use Illuminate\Support\Facades\DB;

class DailyReportLogic
{

    //Instance
    public static function Instance(){
        return new DailyReportLogic();
    }

    //Get Current Report
    public function GetCurrentReport(){

    }

    //Find Report
    public function Find($date){
        $finDate = date('Y-m-d',strtotime($date));

        $getResult = DB::table('daily_report')
            ->where('date','=', $finDate)
            ->first();
        //
        $class = new \stdClass();
        if ($getResult != null){
            $class = new \stdClass();
            $class->in_item = $getResult->in_item;
            $class->out_item = $getResult->out_item;
            $class->outcome = $getResult->outcome;
            $class->income = $getResult->income;
        }
        //
        return $class;
    }

    //Create Report
    public function UpdateCurrentReport($in_items, $out_items, $expense, $income){
        $currentDate = DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT);
        $date = date('Y-m-d',strtotime($currentDate));

        //Check
        $check = DB::table('daily_report')
            ->where('date','=', $date)->first();

        if ($check != null){
            //Mean already have report, update
            $updateResult = DB::table('daily_report')
                ->where('date','=', $date)
                ->update([
                    'in_item' => intval($in_items + $check->in_item),
                    'out_item' => intval($out_items + $check->out_item),
                    'outcome' => floatval($expense + $check->outcome),
                    'income' => floatval($income + $check->income)
                ]);

            return $updateResult;
        }else{
            //Don't have report yet, create
            $insertResult = DB::table('daily_report')
                ->insert([
                    'date' => $currentDate,
                    'in_item' => intval($in_items),
                    'out_item' => intval($out_items),
                    'outcome' => floatval($expense),
                    'income' => floatval($income)
                ]);

            return $insertResult;
        }
    }

    //Edit Old Report
    public function UpdateOldReport($date, $in_items, $out_items, $expense, $income){
        $finDate = date('Y-m-d', strtotime($date));
        $oldData = $this->Find($finDate);
        //
        if ($oldData != null){
            $updateResult = DB::table('daily_report')
                ->where('date','=', $finDate)
                ->update([
                    'in_item' => $in_items + $oldData->in_item,
                    'out_item' => $out_items + $oldData->out_item,
                    'outcome' => $expense + $oldData->outcome,
                    'income' => $income + $oldData->income
                ]);

            return true;
        }else{
            return false;
        }
    }

}