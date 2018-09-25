<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\InvoiceItemLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceItemController extends Controller
{
    //
    public function GetInvoiceItems(Request $request, $invoice_id){
        $returnModel = ReturnModel::Instance();
        $status = $request->input('status', '');

        $getResult = InvoiceItemLogic::Instance()->GetInvoiceItemsForInvoice($invoice_id, $status);

        $returnModel->status = "200";
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }
}
