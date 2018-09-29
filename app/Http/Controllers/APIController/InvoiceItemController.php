<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\InvoiceItemLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceItemController extends Controller
{
    //Get Items for one ivoice
    public function GetInvoiceItems(Request $request, $invoice_id){
        $returnModel = ReturnModel::Instance();
        $status = $request->input('status', '');

        $getResult = InvoiceItemLogic::Instance()->GetInvoiceItemsForInvoice($invoice_id, $status);

        $returnModel->status = "200";
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }

    //Filter Search all item
    public function FilterSearch(Request $request){
        $returnModel = ReturnModel::Instance();
        //
        $search = $request->input('search','');
        $status = $request->input('status','');
        $item_type = $request->input('item_type','');
        $pageSize = $request->input('page_size', 10);

        $getResult = InvoiceItemLogic::Instance()->FilterSearch($search, $status, $item_type, $pageSize);

        $returnModel->status = "200";
        $returnModel->data = $getResult;
        return json_encode($returnModel);
    }

    //Sale Item
    public function SaleItem(Request $request, $item_id){
        $returnModel = ReturnModel::Instance();

        $salePrice = $request->sale_price;

        $result = InvoiceItemLogic::Instance()->SaleInvoiceItem($item_id, floatval($salePrice));

        if ($result){
            //Sale Success
            $returnModel->status = "200";
            $returnModel->data = "Item Sold";
        }else{
            //Can not Sale
            $returnModel->status = "300";
            $returnModel->data = "Item can not be sold";
        }

        return json_encode($returnModel);
    }
}
