<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Base\Logic\ItemTypeLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ItemTypeController extends Controller
{

    //Filter Search
    public function index(Request $request)
    {
        $class = ReturnModel::Instance();

        $search = $request->input('search','');
        $status = $request->input('status','');
        $pageSize = $request->input('page_size',10);

        $getResult = ItemTypeLogic::Instance()->FilterSearch($search, $status, $pageSize);

        $getResult->appends(Input::except('page'));

        $class->status = "200";
        $class->data = $getResult;

        return json_encode($class);
    }

    //Insert Item Type
    public function create(Request $request)
    {
        $class = ReturnModel::Instance();

        $itemTypeName = $request->input('item_type_name');

        if (empty($itemTypeName)) $class->status = "400"; $class->data = "Bad Request";

        $insertResult = ItemTypeLogic::Instance()->Create($itemTypeName);

        if (is_object($insertResult)){
            $class->status = '200';
            $class->data = $insertResult;
        }else{
            $class->status = '301';
            $class->data = "Duplicate Type Name";
        }

        return json_encode($class);
    }

    //Edit Item Type
    public function edit(Request $request, $id)
    {
        $class = ReturnModel::Instance();

        $itemTypeName = $request->input('item_type_name');

        if (empty($itemTypeName)) $class->status = "400"; $class->data = "Bad Request";

        $insertResult = ItemTypeLogic::Instance()->Update($itemTypeName, $id);

        if (is_object($insertResult)){
            $class->status = '200';
            $class->data = $insertResult;
        }else{
            $class->status = '301';
            $class->data = "Duplicate Type Name";
        }

        return json_encode($class);
    }

    //Delete Item Type
    public function destroy($id)
    {
        $class = ReturnModel::Instance();

        $deleteResult = ItemTypeLogic::Instance()->Delete($id);

        if ($deleteResult){
            $class->status = "200";
            $class->data = "Item Type Deleted";
        }else{
            $class->status = "210";
            $class->data = "Item Type Can not Delete";
        }

        return json_encode($class);
    }

    //Deactivate Item Type
    public function deactivate($id){
        $class = ReturnModel::Instance();

        ItemTypeLogic::Instance()->Deactivate($id);

        $class->status = "200";
        $class->data = "Item Type Deactivate";

        return json_encode($class);
    }

    //Activate Item Type
    public function activate($id){
        $class = ReturnModel::Instance();

        ItemTypeLogic::Instance()->Activate($id);

        $class->status = "200";
        $class->data = "Item Type Activate";

        return json_encode($class);
    }

}
