<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:50 PM
 */

namespace App\Http\Controllers\Base\Logic;

use App\Http\Controllers\Base\Model\BaseModel;
use App\Http\Controllers\Base\Model\GeneralStatus;
use App\Http\Controllers\Base\Model\ItemTypeModel;
use Illuminate\Support\Facades\DB;

class ItemTypeLogic
{

    private function ManipulateDataArray(array $datas){
        $array = array();

        foreach ($datas as $data){
            $model = BaseModel::Model(BaseModel::ITEM_TYPE);
            $model->id = $data->id;
            $model->item_type_name = $data->type_name;
            $model->status = $data->status;
            $model->display_status = ($data->status === true) ? "Active":"Inactive";
            $model->delete_able = $data->delete_able;

            array_push($array, $model);
        }

        return $array;
    }

    //Check duplicate before update
    public function CheckDuplicateBeforeUpdate($new_type_name, $id){
        $checkResult = DB::table('item_type')
            ->where('type_name','=', $new_type_name)
            ->where('id','<>', $id);
        if ($checkResult->count()){
            return true;
        }else{
            return false;
        }
    }

    //Check for duplicate before insert
    public function CheckDuplicateBeforeInsert($type_name){
        $checkResult = DB::table('item_type')
            ->where('type_name','=', $type_name);
        if ($checkResult->count()){
            return true;
        }else{
            return false;
        }
    }

    //Find one item type
    public function Find($id){
        $getResult = DB::table('item_type')
            ->where('id','=', $id)
            ->first();

        $model = BaseModel::Model(BaseModel::ITEM_TYPE);
        $model->id = $getResult->id;
        $model->item_type_name = $getResult->type_name;
        $model->status = $getResult->status;
        $model->display_status = ($getResult->status === true) ? "Active":"Inactive";
        $model->delete_able = $getResult->delete_able;

        return $model;
    }

    //Create item Type
    public function Create(ItemTypeModel $itemTypeModel){
        //Check Duplicate
        $duplicate = $this->CheckDuplicateBeforeInsert($itemTypeModel->item_type_name);

        if (!$duplicate){
            //Can Insert
            $insertResult = DB::table('item_type')
                ->insertGetId([
                    'type_name' => $itemTypeModel->item_type_name,
                ]);

            $model = $this->Find($insertResult);
            return $model;
        }else{
            return false;
        }
    }

    //Update Item Type
    public function Update($newTypeName, $id){
        //CheckDuplicate
        $duplicate = $this->CheckDuplicateBeforeUpdate($newTypeName, $id);

        if (!$duplicate){
            //Can Update
            DB::table('item_type')->where('id','', $id)
                ->update([
                    'type_name' => $newTypeName
                ]);

            $model = $this->Find($id);
            return $model;
        }else{
            return false;
        }
    }

    //Deactivate Item Type
    public function Deactivate($id){
        DB::table('item_type')->where('$id','=', $id)
            ->update([
                'status' => false
            ]);

        $model = $this->Find($id);
        return $model;
    }

    //Activate Item Type
    public function Activate($id){
        DB::table('item_type')->where('$id','=', $id)
            ->update([
                'status' => true
            ]);

        $model = $this->Find($id);
        return $model;
    }

    //Delete Item Type
    public function Delete($id){
        //Find Item Type
        $model = $this->Find($id);

        if ($model->delete_able){
            //Can Delete
            DB::table('item_type')->where('$id','=', $id)
                ->delete();

            return true;
        }else{
            return false;
        }
    }

    //Filter search Item Type
    public function FilterSearch($search, $status = null, $page_size){
        //Condition Page Size
        $finalPageSize = ($page_size > 0) ? $page_size:10;

        if ($status == null){
            if (empty($search)){
                $getResult = DB::table('item_type')->paginate($finalPageSize);

                return $getResult;
            }else{
                $getResult = DB::table('item_type')
                    ->where('type_name','like', $search)
                    ->paginate($finalPageSize);

                return $getResult;
            }
        }elseif ($status != null){
            if (empty($search)){
                $getResult = DB::table('item_type')
                    ->where('status','=', $status)
                    ->paginate($finalPageSize);

                return $getResult;
            }else{
                $getResult = DB::table('item_type')
                    ->where('type_name','like', $search)
                    ->where('status','=', $status)
                    ->paginate($finalPageSize);

                return $getResult;
            }
        }
    }

}