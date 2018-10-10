<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:50 PM
 */

namespace App\Http\Controllers\Base\Logic;

use App\Http\Controllers\Base\Model\BaseModel;
use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\GeneralStatus;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Support\Facades\DB;

class ItemTypeLogic
{

    //Instance Method
    public static function Instance(){
        return new ItemTypeLogic();
    }

    //Finalize General Status
    private function FinalizeStatus($status){
        if ($status == GeneralStatus::ACTIVE){
            return 1;
        }elseif ($status == GeneralStatus::INACTIVE){
            return 0;
        }
    }

    //Make Item Type Can not Delete
    public function MakeItemTypeUnDeleteAble($id){
        $updateResult = DB::table('item_type')
            ->where('id','=', $id)
            ->update([
                'delete_able' => false
            ]);

        return $updateResult;
    }

    //Check duplicate before update
    public function CheckDuplicateBeforeUpdate($new_type_name, $id){
        $checkResult = DB::table('item_type')
            ->where('type_name','=', $new_type_name)
            ->where('deleted', '=', false)
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
            ->where('type_name','=', $type_name)
            ->where('deleted', '=', false);
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
    public function Create($type_name){
        //Check Duplicate
        $duplicate = $this->CheckDuplicateBeforeInsert($type_name);

        if (!$duplicate){
            $changeLogArray = array();
            //Can Insert
            $insertResult = DB::table('item_type')
                ->insertGetId([
                    'type_name' => $type_name,
                ]);

            //Change Log
            $changeLogArray = UserAuditLogic::Instance()
                ->CompareField(AuditGroup::ITEM_TYPE_NAME,$type_name,$type_name,UserActionEnum::Add,$changeLogArray);

            //User Auditrail
            UserAuditLogic::Instance()
                ->UserItemTypeAction($insertResult, UserActionEnum::INSERT, $type_name, $changeLogArray);

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
            $oldModel = $this->Find($id);
            $changeLogArray = array();
            //Can Update
            DB::table('item_type')->where('id','=', $id)
                ->update([
                    'type_name' => $newTypeName
                ]);

            //Change Log
            $changeLogArray = UserAuditLogic::Instance()
                ->CompareField(AuditGroup::ITEM_TYPE_NAME,$oldModel->item_type_name, $newTypeName,
                    UserActionEnum::UPDATE, $changeLogArray);

            //User Auditrail
            UserAuditLogic::Instance()
                ->UserItemTypeAction($id, UserActionEnum::UPDATE, $newTypeName, $changeLogArray);

            $model = $this->Find($id);
            return $model;
        }else{
            return false;
        }
    }

    //Deactivate Item Type
    public function Deactivate($id){
        DB::table('item_type')->where('id','=', $id)
            ->update([
                'status' => false
            ]);

        $object = $this->Find($id);

        //User AuditTrail
        UserAuditLogic::Instance()
            ->UserItemTypeAction($id, UserActionEnum::DEACTIVATE, $object->item_type_name, []);

        $model = $this->Find($id);
        return $model;
    }

    //Activate Item Type
    public function Activate($id){
        DB::table('item_type')->where('id','=', $id)
            ->update([
                'status' => true
            ]);

        $object = $this->Find($id);

        //User AuditTrail
        UserAuditLogic::Instance()
            ->UserItemTypeAction($id, UserActionEnum::ACTIVATE, $object->item_type_name, []);

        $model = $this->Find($id);
        return $model;
    }

    //Delete Item Type
    public function Delete($id){
        //Find Item Type
        $model = $this->Find($id);

        if ($model->delete_able){
            //Can Delete
            DB::table('item_type')->where('id','=', $id)
                ->update([
                    "deleted" => true
                ]);

            //User AuditTrail
            UserAuditLogic::Instance()
                ->UserItemTypeAction($id, UserActionEnum::DELETE, $model->item_type_name, []);

            return true;
        }else{
            return false;
        }
    }

    //Filter search Item Type
    public function FilterSearch($search, $status, $page_size){
        //Condition Page Size
        $finalPageSize = ($page_size > 0) ? $page_size:10;
        //Condition Status
        $finalStatus = $this->FinalizeStatus($status);

        $getResult = DB::table('item_type')
            ->where('deleted','=', false)
            ->when(!empty($search), function ($query) use ($search){
                return $query->where('type_name', '=', '%'.$search.'%');
            })
            ->when(!empty($status), function ($query) use ($finalStatus){
                return $query->where('status', '=', $finalStatus);
            })
            ->paginate($page_size);

        return $getResult;
    }

}