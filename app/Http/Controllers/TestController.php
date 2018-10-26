<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\NotificationLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\InvoicePaymentLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
//
//        $jsonString = "{
//  \"email\":\"chansotheabo@gmail.com\",
//  \"notification\":{
//    \"backup_data\": true,
//    \"invoice\": {
//      \"insert\": true,
//      \"edit\": false,
//      \"payment\": true,
//      \"took\": false
//    },
//    \"item\": {
//      \"add\": false,
//      \"depreciation\": false,
//      \"sale\": false
//    }
//  }
//}";
        $model = NotificationLogic::Instance()->GetAdminEmail();
        $appname = config('app.name');
        $dir = storage_path('app');
        $complete = $dir.'\/'.$appname;
        $files = scandir($complete, SCANDIR_SORT_DESCENDING);
        $newest_file = $files[0];
        $body = 'This is the back up data of: '.DateTimeLogic::Instance()
                ->GetCurrentDateTime(DateTimeLogic::SHOW_DATE_TIME_FORMAT);
        //
        foreach ($model as $mail){
            Mail::raw($body, function ($email) use ($complete, $newest_file, $mail){
                $email
                    ->to($mail)
                    ->attach($complete.'\/'.$newest_file)
                    ->subject('Database Backup');
            });
        }
        return json_encode($model);
    }
}
