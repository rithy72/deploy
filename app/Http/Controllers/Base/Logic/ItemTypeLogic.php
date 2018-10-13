<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:50 PM
 */

namespace App\Http\Controllers\Base\Logic;

use App\Http\Controllers\Base\Model\Enum\AuditGroup;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\ItemTypeModel;
use App\Http\Controllers\Base\Model\Other\PaginateModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ItemTypeLogic
{

    public const FEATURES = ["ចំណាំទី 1","ចំណាំទី 2","ចំណាំទី 3","ចំណាំទី 4"];

    //Instance Method
    public static function Instance(){
        return new ItemTypeLogic();
    }

    //Change Log
    private function ChangeLog(ItemTypeModel $new_object, ItemTypeModel $old_object, $id, $flag, $changelog_array){
        $userAuditLogicInstance = UserAuditLogic::Instance();
        //Name
        $changelog_array = $userAuditLogicInstance->CompareField(AuditGroup::ITEM_TYPE_NAME, $old_object->item_type_name,
            $new_object->item_type_name, $flag, $changelog_array);
        //First
        $changelog_array = $userAuditLogicInstance->CompareField(AuditGroup::ITEM_FIRST_NOTE, $old_object->first_note,
            $new_object->first_note, $flag, $changelog_array);
        //Second
        $changelog_array = $userAuditLogicInstance->CompareField(AuditGroup::ITEM_SECOND_NOTE, $old_object->second_note,
            $new_object->second_note, $flag, $changelog_array);
        //Third
        $changelog_array = $userAuditLogicInstance->CompareField(AuditGroup::ITEM_THIRD_NOTE, $old_object->third_note,
            $new_object->third_note, $flag, $changelog_array);
        //Fourth
        $changelog_array = $userAuditLogicInstance->CompareField(AuditGroup::ITEM_FOURTH_NOTE, $old_object->fourth_note,
            $new_object->fourth_note, $flag, $changelog_array);
        //
        return $changelog_array;
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
        //
        $model = ItemTypeModel::FinalizeModel($getResult);
        //
        return $model;
    }

    //Create item Type
    public function Create(ItemTypeModel $itemTypeModel){

        if (empty($itemTypeModel->item_type_name)) return false;

        $type_name = $itemTypeModel->item_type_name;
        $first = $itemTypeModel->first_note ?? ItemTypeLogic::FEATURES[0];
        $second = $itemTypeModel->second_note ?? ItemTypeLogic::FEATURES[1];
        $third = $itemTypeModel->third_note ?? ItemTypeLogic::FEATURES[2];
        $fourth = $itemTypeModel->fourth_note ?? ItemTypeLogic::FEATURES[3];
        $noteString = $first.','.$second.','.$third.','.$fourth;

        //Check Duplicate
        $duplicate = $this->CheckDuplicateBeforeInsert($type_name);

        if (!$duplicate){
            $changeLogArray = array();
            //Can Insert
            $insertResult = DB::table('item_type')
                ->insertGetId([
                    'type_name' => $type_name,
                    'notes' => $noteString
                ]);
            //
            $itemTypeObj = $this->Find($insertResult);
            //Change Log
            $changeLogArray = $this
                ->ChangeLog($itemTypeObj, $itemTypeObj, $itemTypeObj->id, UserActionEnum::INSERT, $changeLogArray);
            //User Auditrail
            UserAuditLogic::Instance()
                ->UserItemTypeAction($itemTypeObj->id, UserActionEnum::INSERT, $itemTypeObj->item_type_name,
                    $changeLogArray);

            return $itemTypeObj;
        }else{
            return false;
        }
    }

    //Update Item Type
    public function Update(ItemTypeModel $item_type_object, $id){
        //CheckDuplicate
        $duplicate = $this->CheckDuplicateBeforeUpdate($item_type_object->item_type_name, $id);
        //
        if (!$duplicate){
            $oldObj = $this->Find($id);
            $changeLogArray = array();
            //
            $first = $itemTypeModel->first_note ?? ItemTypeLogic::FEATURES[0];
            $second = $itemTypeModel->second_note ?? ItemTypeLogic::FEATURES[1];
            $third = $itemTypeModel->third_note ?? ItemTypeLogic::FEATURES[2];
            $fourth = $itemTypeModel->fourth_note ?? ItemTypeLogic::FEATURES[3];
            $noteString = $first.','.$second.','.$third.','.$fourth;
            //Can Update
            DB::table('item_type')->where('id','=', $id)
                ->update([
                    'type_name' => $item_type_object->item_type_name,
                    'notes' => $noteString
                ]);
            $newObj = $this->Find($id);
            //Change Log
            $changeLogArray = $this->ChangeLog($newObj, $oldObj, $id, UserActionEnum::UPDATE, $changeLogArray);

            //User Auditrail
            UserAuditLogic::Instance()
                ->UserItemTypeAction($id, UserActionEnum::UPDATE, $newObj->item_type_name, $changeLogArray);

            return $newObj;
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
        $getResult = DB::table('item_type')
            ->where('deleted','=', false)
            ->when(!empty($search), function ($query) use ($search){
                return $query->where('type_name', '=', '%'.$search.'%');
            })
            ->when(!empty($status), function ($query) use ($status){
                return $query->where('status', '=', $status);
            })
            ->paginate($page_size);
        //
        $getResult->appends(Input::except('page'));
        //
        $returnArray = array();
        foreach ($getResult as $result){
            $model = ItemTypeModel::FinalizeModel((object)$result);
            array_push($returnArray, $model);
        }
        //
        $returnModel = PaginateModel::Instance()->FinalizePaginateModel($returnArray, $getResult);
        //
        return $returnModel;
    }

}