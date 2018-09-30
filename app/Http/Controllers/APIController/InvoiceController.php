<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\InvoiceInfoLogic;
use App\Http\Controllers\Base\Logic\InvoicePaymentLogic;
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

    //Invoice Payment
    public function InvoicePaymentAndItemsTransaction(Request $request, $invoice_id){
        $returnModel = ReturnModel::Instance();

        $interests = $request->input('interests_payment',0);
        $costPayment = $request->input('cost_payment', 0);
        $addCost = $request->input('add_cost',0);
        $addMoreItems = $request->input('add_items', null);
        $depreciateItem = $request->input('depreciate_items', null);

        //Payment and Items Transaction
        $result = InvoicePaymentLogic::Instance()->InvoicePayment(
            $interests, $costPayment, $addCost, $addMoreItems, $depreciateItem, $invoice_id
        );

        if ($result){
            $returnModel->status = "200";
            $returnModel->data = "Payment Complete";
        }else{
            $returnModel->status = "300";
            $returnModel->data = "Invoice can not do any more transaction";
        }

        return json_encode($returnModel);
    }

    //Took Invoice
    public function TookInvoice($invoice_id){
        $returnModel = ReturnModel::Instance();

        $result = InvoiceInfoLogic::Instance()->TookInvoice($invoice_id);

        if ($result){
            $returnModel->status = "200";
            $returnModel->data = "Took Invoice";
        }else{
            $returnModel->status = "300";
            $returnModel->data = "Can not took Invoice";
        }

        return json_encode($returnModel);
    }

    //Get Invoice Transaction History
    public function OneInvoiceTransactionHistory(Request $request, $invoice_id){
        $returnModel = ReturnModel::Instance();
        $fromDate = $request->input('from_date',"");
        $toDate = $request->input('to_date',"");
        $action = $request->input('action', "");
        $group = $request->input('group',"");
        $pageSize = $request->input('page_size',10);

        $result = InvoiceInfoLogic::Instance()
            ->InvoiceAndItemTransactionHistory($fromDate, $toDate, $action, $group, $invoice_id, $pageSize);

        $returnModel->status = "200";
        $returnModel->data = $result;
        return json_encode($returnModel);
    }

    //Get Over 60days Due Invoices
    public function GetOverDueInvoices(Request $request){
        $returnModel = ReturnModel::Instance();
        $pageSize = $request->input('page_size',10);
        //
        $getResult = InvoiceInfoLogic::Instance()->GetOverDueInvoices($pageSize);

        $returnModel->status = "200";
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }
}
