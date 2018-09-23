<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\DailyReportLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DailyReport extends Controller
{
    //
    public function getCurrentReport(){
        $getResult = DailyReportLogic::Instance()->GetCurrentReport();

        $returnModel = ReturnModel::Instance();
        $returnModel->status = 200;
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }
}
