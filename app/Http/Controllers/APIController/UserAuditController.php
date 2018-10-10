<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAuditController extends Controller
{
    //Get User Audit Trail
    public function search(Request $request){
        $fromDate = $request->input('from_date','');
        $toDate = $request->input('to_date','');
        $group = $request->input('group','');
        $action = $request->input('action','');
        $pageSize = $request->input('page_size',10);
        //
        $result = UserAuditLogic::Instance()
            ->search($fromDate, $toDate, "", $group, $action, "", "", $pageSize);
        //
        $returnModel = ReturnModel::Instance();
        $returnModel->status = "200";
        $returnModel->data = $result;
        return json_encode($returnModel);
    }
}
