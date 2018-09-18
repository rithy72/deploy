<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\DailyReportLogic;
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
        $invoiceModel = new \stdClass();
        $invoiceModel->customer_name = "Johnny (Edited)";
        $invoiceModel->customer_phone = "023211112 (Edited)";
        $invoiceModel->grand_total = 10000;
        $invoiceModel->interests_rate = 7;

        //Add New
        $itemArray = array();
        for ($i = 0; $i < 5; $i++){
            $itemModel = new \stdClass();
            $itemModel->item_type_id = 1;
            $itemModel->first_feature = "Honda Dream";
            $itemModel->second_feature = "Black";
            $itemModel->third_feature = "2AH-1035";
            $itemModel->fourth_feature = "Skull Sticker";

            array_push($itemArray, $itemModel);
        }

        //Modify
        $modifyItem = array();
        for ($i = 0; $i < 5; $i++){
            $itemModel = new \stdClass();
            $itemModel->id = random_int(1,5);
            $itemModel->item_type_id = 1;
            $itemModel->first_feature = "Honda Dream (Edited)";
            $itemModel->second_feature = "Black (Edited)";
            $itemModel->third_feature = "2AH-1035 (Edited)";
            $itemModel->fourth_feature = "Skull Sticker (Edited)";

            array_push($modifyItem, $itemModel);
        }

        //Delete
        $deleteItem = array();
        for ($i = 0; $i < 5; $i++){
            array_push($deleteItem, $i);
        }
        $invoiceModel->new_items = $itemArray;
        $invoiceModel->modify_items = $modifyItem;
        $invoiceModel->delete_items = $deleteItem;

        //$insertResult = InvoiceInfoLogic::Instance()->Update($invoiceModel, $modifyItem, $itemArray, $deleteItem, 1);
        return json_encode($invoiceModel);

//        $get = InvoiceInfoLogic::Instance()->Find(1);
//        DailyReportLogic::Instance()->Find($get->invoice_info->created_date);
//        DailyReportLogic::Instance()->UpdateOldReport($get->invoice_info->created_date,2,0,0,0);
//        $report = DailyReportLogic::Instance()->Find($get->invoice_info->created_date);
//        return json_encode($report);

    }
}
