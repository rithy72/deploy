<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\InvoiceInfoLogic;
use App\Http\Controllers\Base\Model\InvoiceInfoModel;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    //Create New Invoice
    public function create(Request $request){
        $class = ReturnModel::Instance();

        //Invoice Info
        $invoiceModel = InvoiceInfoModel::Instance();
        $invoiceModel->customer_name = $request->input('customer_name','');
        $invoiceModel->customer_phone = $request->input('customer_phone','');
        $invoiceModel->grand_total = $request->input('grand_total',0);
        $invoiceModel->interests_rate = $request->input('interests_rate','');
        //Invoice Items
        $itemsArray = $request->invoice_items;

        //Insert Invoice
        $insertResult = InvoiceInfoLogic::Instance()->Create($invoiceModel, $itemsArray);

        //Return Result
        if ($insertResult == false){
            //Lack Information
            $class->status = "400";
            $class->data = "Lack Information";
        }else{
            //Success
            $class->status = "200";
            $class->data = $insertResult;
        }

        return json_encode($class);
    }

}
