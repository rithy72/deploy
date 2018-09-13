<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:53 PM
 */

namespace App\Http\Controllers\Base\Logic;


use App\Http\Controllers\Base\Model\Enum\InvoiceItemStatusEnum;
use App\Http\Controllers\Base\Model\InvoiceItemModel;
use Illuminate\Support\Facades\DB;

class InvoiceItemLogic
{

    //Instance Method
    public static function Instance(){
        return new InvoiceItemLogic();
    }

    //Insert Item Method
    public function Create(InvoiceItemModel $invoice_item_model, $line_number, $invoice_id){
        $insertResult = DB::table('invoice_item')
            ->insert([
                'id' => $line_number,
                'invoice_id' => $invoice_id,
                'item_type_id' => $invoice_item_model->item_type_id,
                'first_feature' => $invoice_item_model->first_feature,
                'second_feature' => $invoice_item_model->second_feature,
                'third_feature' => $invoice_item_model->third_feature,
                'fourth_feature' => $invoice_item_model->fourth_feature,
                'status' => InvoiceItemStatusEnum::OPEN,
            ]);

        return $insertResult;
    }

}