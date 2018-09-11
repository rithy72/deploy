<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:02 PM
 */

namespace App\Http\Controllers\Base\Model;

    //Invoice Info Model
class BaseModel{
    const ITEM_TYPE = 1;
    //
    const INVOICE_INFO = 2;
    const INVOICE_ITEM = 3;

    public static function Model($choice){
        $obj = null;

        switch ($choice){
            case BaseModel::ITEM_TYPE:
                $obj = new ItemTypeModel();
                break;
            case BaseModel::INVOICE_INFO:
                $obj = new InvoiceInfoModel();
                break;
            case BaseModel::INVOICE_ITEM:
                $obj = new InvoiceItemModel();
                break;
            default:
                $obj = null;
        }

        return $obj;
    }
}



