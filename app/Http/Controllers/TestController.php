<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\DailyReportLogic;
use App\Http\Controllers\Base\Logic\InvoiceInfoLogic;
use App\Http\Controllers\Base\Logic\InvoiceItemLogic;
use App\Http\Controllers\Base\Logic\ItemTypeLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\InvoicePaymentLogic;
use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Model\BaseModel;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use App\Http\Controllers\Base\Model\Enum\InvoiceSearchOptionEnum;
use App\Http\Controllers\Base\Model\InvoiceInfoModel;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

//This controller make for testing Class
class TestController extends Controller
{
    //
    public function Test(Request $request){
        $input = "";
        return view('test.test')->with('products',$input);
    }

    //
    public function Post(Request $request){
        $input = $request->input('products','');
        return view('test.test')->with('products',$input);
    }

    public function API(){

//        $getResult = InvoiceInfoLogic::Instance()->FilterSearch('',InvoiceSearchOptionEnum::CUSTOMER_PHONE,
//            '1', 15);
//        return $getResult;
//        $changeLogArray = array();
//
//        for ($i = 0; $i < 10; $i++){
//            $changeLogArray = UserAuditLogic::Instance()->CompareField(
//                random_int(1,3), $i, $i +1, random_int(1,2), $changeLogArray
//            );
//        }

        $result = InvoiceItemLogic::Instance()->FilterSearch("", "", "",10);
        //$result = explode(',',"Camry 2016,White,2RE-4568,");

        return json_encode($result);
    }
}
