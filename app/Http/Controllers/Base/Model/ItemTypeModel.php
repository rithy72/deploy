<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 8:30 PM
 */

namespace App\Http\Controllers\Base\Model;


use App\Http\Controllers\Base\Logic\ItemTypeLogic;

class ItemTypeModel
{
    public $id;
    public $type_name;
    public $status;
    public $display_status;
    public $first_note;
    public $second_note;
    public $third_note;
    public $fourth_note;
    public $notes;
    public $delete_able;

    public static function Instance(){
        return new ItemTypeModel();
    }

    public static function FinalizeNotes($note_string){
        $model = ItemTypeModel::Instance();
        $notesArray = explode(',', $note_string);
        //
        $model->first_note = $notesArray[0] ?? ItemTypeLogic::FEATURES[0];
        $model->second_note = $notesArray[1] ?? ItemTypeLogic::FEATURES[1];
        $model->third_note = $notesArray[2] ?? ItemTypeLogic::FEATURES[2];
        $model->fourth_note = $notesArray[3] ?? ItemTypeLogic::FEATURES[3];
        //
        return $model;
    }

    public static function FinalizeModel($item_type_model){
        $model = ItemTypeModel::Instance();
        $notesFinalize = ItemTypeModel::FinalizeNotes($item_type_model->notes);
        $model->id = $item_type_model->id;
        $model->type_name = $item_type_model->type_name;
        $model->status = $item_type_model->status;
        $model->display_status = ($item_type_model->status === true) ? "Active":"Inactive";
        $model->delete_able = $item_type_model->delete_able;
        $model->first_note = $notesFinalize->first_note;
        $model->second_note = $notesFinalize->second_note;
        $model->third_note = $notesFinalize->third_note;
        $model->fourth_note = $notesFinalize->fourth_note;
        //
        return $model;
    }
}