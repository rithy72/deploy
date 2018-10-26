<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 10:44 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DailyReportLogic
{

    //Instance
    public static function Instance(){
        return new DailyReportLogic();
    }

    //Get Current Report
    public function GetCurrentReport(){
        $date = DateTimeLogic::Instance()->GetCurrentDateTime(DateTimeLogic::DB_DATE_TIME_FORMAT);
        $finDate = date('Y-m-d',strtotime($date));

        $getResult = DB::table('daily_report')
            ->where('date','=', $finDate)
            ->first();

        if ($getResult == null || empty($getResult)){
            $this->UpdateCurrentReport(0,0,0,0);
        }

        //Get All Item In warehouse
        $itemsInWarehouse = 0;
        if ($getResult != null){
            $itemsInWarehouse = DB::table('invoice_item')
                ->whereNotIn('status', [InvoiceItemStatusEnum::CLOSE, InvoiceItemStatusEnum::SOLD])
                ->count();
        }

        $class = new \stdClass();
        $class->items_in_warehouse = $itemsInWarehouse;
        $class->in_item = ($getResult != null) ? $getResult->in_item:0;
        $class->out_item = ($getResult != null) ? $getResult->out_item:0;
        $class->outcome = ($getResult != null) ? $getResult->outcome:0;
        $class->income = ($getResult != null) ? $getResult->income:0;

        return $class;
    }

    //Find Report
    public function Find($date){
        $finDate = date('Y-m-d',strtotime($date));

        $getResult = DB::table('daily_report')
            ->where('date','=', $finDate)
            ->first();
        //
        $class = new \stdClass();
        $class->in_item = $getResult->in_item ?? 0;
        $class->out_item = $getResult->out_item ?? 0;
        $class->outcome = $getResult->outcome ?? 0;
        $class->income = $getResult->income ?? 0;

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

    //Get Start Day of using system
    public function GetStartDayOfUsing(){
        $getDate = DB::table('daily_report')
            ->select('date')->orderBy('date', 'asc')->first();
        $from_date = $getDate->date;
        return $from_date;
    }

    //Filter Search Daily Report
    public function FilterSearch($from_date, $to_date, $page_size){
        $dateInstance = DateTimeLogic::Instance();
        //Check From Date
        if (empty($from_date)){
            $from_date = $this->GetStartDayOfUsing();
        }
        //
        $fromDate = (empty($from_date)) ?
            $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_FORMAT) :
            $dateInstance->FormatDatTime($from_date, DateTimeLogic::DB_DATE_TIME_FORMAT);
        $toDate = (empty($to_date)) ?
            $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_FORMAT) :
            $dateInstance->FormatDatTime($to_date, DateTimeLogic::DB_DATE_TIME_FORMAT);
        //
        $getResult = DB::table('daily_report')
            ->whereBetween('date', array($fromDate, $toDate))
            ->orderBy('date', 'desc')
            ->paginate($page_size);

        $getResult->appends(Input::except("page"));

        return $getResult;
    }

    //Calculate Expense and Income
    public function Calculate($from_date, $to_date){
        $dateInstance = DateTimeLogic::Instance();
        //Check From Date
        if (empty($from_date)){
            $from_date = $this->GetStartDayOfUsing();
        }
        //
        $fromDate = (empty($from_date)) ?
            $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_FORMAT) :
            $dateInstance->FormatDatTime($from_date, DateTimeLogic::DB_DATE_TIME_FORMAT);
        $toDate = (empty($to_date)) ?
            $dateInstance->GetCurrentDateTime(DateTimeLogic::DB_DATE_FORMAT) :
            $dateInstance->FormatDatTime($to_date, DateTimeLogic::DB_DATE_TIME_FORMAT);
        //

        $returnModel = new \stdClass();
        $returnModel->sum_expense = DB::table('daily_report')
            ->whereBetween('date', array($fromDate, $toDate))->sum('outcome');
        $returnModel->sum_income = DB::table('daily_report')
            ->whereBetween('date', array($fromDate, $toDate))->sum('income');
        $returnModel->sum_in_items = DB::table('daily_report')
            ->whereBetween('date', array($fromDate, $toDate))->sum('in_item');
        $returnModel->sum_out_items = DB::table('daily_report')
            ->whereBetween('date', array($fromDate, $toDate))->sum('out_item');

        return $returnModel;
    }

}