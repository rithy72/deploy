<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\OtherLogic\InvoicePaymentLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
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


        $from_date = UserLogic::Instance()->FilterSearch("","","", 10);
        return json_encode($from_date);
    }
}
