<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\DailyReportLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\InvoicePaymentLogic;
use Illuminate\Http\Request;

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


        $getResult = DailyReportLogic::Instance()->Calculate("","");
        return json_encode($getResult);
    }
}
