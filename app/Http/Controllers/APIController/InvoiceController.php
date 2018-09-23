<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\InvoiceInfoLogic;
use App\Http\Controllers\Base\Model\InvoiceInfoModel;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class InvoiceController extends Controller
{

    //Find one invoice
    public function find($id){
        $class = ReturnModel::Instance();

        //Get Data
        $invoiceResult = InvoiceInfoLogic::Instance()->Find(intval($id));

        //Return Data
        $class->status = "200";
        $class->data = $invoiceResult;

        return json_encode($class);
    }

    //Filter Search
    public function search(Request $request){
        $search = $request->input('search','');
        $searchOption = $request->input('option','');
        $status = $request->input('status','');
        $pageSize = $request->input('page_size',10);

        //
        $getResult = InvoiceInfoLogic::Instance()->FilterSearch($search, $searchOption, $status, $pageSize);
        $getResult->appends(Input::except('page'));

        $class = ReturnModel::Instance();
        $class->status = "200";
        $class->data = $getResult;
        return json_encode($class);

    }

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

    //Edit One Invoice
    public function edit(Request $request, $id){
        $class = ReturnModel::Instance();

        //Invoice Info
        $invoiceModel = InvoiceInfoModel::Instance();
        $invoiceModel->customer_name = $request->input('customer_name','');
        $invoiceModel->customer_phone = $request->input('customer_phone','');
        $invoiceModel->grand_total = $request->input('grand_total',0);
        $invoiceModel->interests_rate = $request->input('interests_rate','');
        //Invoice Items
        $addNewItemsArray = $request->new_items;
        $editItemsArray = $request->modify_items;
        $deletedItemsArray = $request->delete_items;

        //Update Invoice
        $updateResult = InvoiceInfoLogic::Instance()->Update($invoiceModel, $editItemsArray, $addNewItemsArray,
            $deletedItemsArray, $id);

        //Return Result
        if ($updateResult == false){
            //Can not update
            $class->status = "401";
            $class->data = "Can not edit invoice";
        }else{
            //Update Success
            $class->status = "200";
            $class->data = $updateResult;
        }

        return json_encode($class);
    }

}
