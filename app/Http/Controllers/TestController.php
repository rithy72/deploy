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
        $search = $request->input('search','');
        $status = $request->input('status','');

        $insert = new ItemTypeLogic();
        $insertResult = $insert->FilterSearch($search, $status,1);

        return view('test.test')->with('filter', $insertResult);
    }
}
