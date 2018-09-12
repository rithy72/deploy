<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\ItemTypeLogic;
use App\Http\Controllers\Base\Model\BaseModel;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use Illuminate\Http\Request;
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
        return "Hello World";
    }
}
