<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\OtherLogic\InvoicePaymentLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\SecureLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


        $userObj = UserLogic::Instance()->Find(Auth::id());
        //$getResult = Hash::check("admin@admin123456", $userObj->password);
        $getResult = SecureLogic::Instance()->CheckAdminPassword("admin@admin123456");
        return dd($getResult);
    }
}
