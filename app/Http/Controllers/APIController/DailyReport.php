<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\DailyReportLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyReport extends Controller
{
    //Get Current Report
    public function getCurrentReport(){
        $getResult = DailyReportLogic::Instance()->GetCurrentReport();

        $returnModel = ReturnModel::Instance();
        $returnModel->status = 200;
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }

    //Filter Search Daily Report
    public function Filter(Request $request){
        $fromDate = $request->input('from_date','');
        $toDate = $request->input('to_date','');
        $pageSize = $request->input('',10);
        //
        $getResult = DailyReportLogic::Instance()->FilterSearch($fromDate, $toDate,$pageSize);

        $returnModel = ReturnModel::Instance();
        $returnModel->status = "200";
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }
}
