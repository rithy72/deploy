<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\NotificationLogic;
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

        $jsonString = "{
  \"email\":\"chansotheabo@gmail.com\",
  \"notification\":{
    \"backup_data\": true,
    \"invoice\": {
      \"insert\": true,
      \"edit\": false,
      \"payment\": true,
      \"took\": false
    },
    \"item\": {
      \"add\": false,
      \"depreciation\": false,
      \"sale\": false
    }
  }
}";
        $model = NotificationLogic::Instance()->Insert(json_decode($jsonString));
        return json_encode($model);
    }
}
