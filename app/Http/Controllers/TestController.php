<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Base\Logic\ItemTypeLogic;
use App\Http\Controllers\Base\Model\BaseModel;

//This controller make for testing Class
class TestController extends Controller
{
    //
    public function Test(){
        $testModel = BaseModel::Model(BaseModel::ITEM_TYPE);
        $testModel->item_type_name = "Car1";


        $insert = new ItemTypeLogic();
        $insertResult = $insert->FilterSearch("", null, 200);
        echo var_dump($insertResult);
    }
}
