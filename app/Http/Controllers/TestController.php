<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\InvoiceInfoLogic;
use App\Http\Controllers\Base\Logic\ItemTypeLogic;
use App\Http\Controllers\Base\Logic\OtherLogic\DateTimeLogic;
use App\Http\Controllers\Base\Model\BaseModel;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
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
//        $invoiceModel = new \stdClass();
//        $invoiceModel->customer_name = "Johnny";
//        $invoiceModel->customer_phone = "023221121";
//        $invoiceModel->grand_total = 3000;
//        $invoiceModel->interests_rate = 5;
//
//        $itemArray = array();
//        for ($i = 0; $i < 5; $i++){
//            $itemModel = new \stdClass();
//            $itemModel->item_type_id = 1;
//            $itemModel->first_feature = "Honda Dream";
//            $itemModel->second_feature = "Black";
//            $itemModel->third_feature = "2AH-1035";
//            $itemModel->fourth_feature = "Skull Sticker";
//
//            array_push($itemArray, $itemModel);
//        }
//
//        $invoiceModel->invoice_items = $itemArray;

        $insertResult = InvoiceInfoLogic::Instance()->Find(1);
        return json_encode($insertResult);


    }
}
