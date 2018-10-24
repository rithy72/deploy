<?php

namespace App\Http\Controllers;

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

//        $appname = config('app.name');
//        $dir = storage_path('app');
//        $complete = $dir.'\/'.$appname;
//        $files = scandir($complete, SCANDIR_SORT_DESCENDING);
//        $newest_file = $files[0];
//        Mail::raw('Backup Bitch', function ($email) use ($complete, $newest_file){
//            $email->to('chansotheabo46@gmail.com')
//                ->attach($complete.'\/'.$newest_file)
//                ->subject('Backup Bitch');
//        });

    }
}
