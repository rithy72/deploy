<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/25/2018
 * Time: 8:56 PM
 */

namespace App\Http\Controllers\Base\Model\Other;


class PaginateModel
{
    public $current_page;
    public $data;
    public $first_page_url;
    public $from;
    public $last_page;
    public $last_page_url;
    public $url;
    public $next_page_url;
    public $path;
    public $per_page;
    public $prev_page_url;
    public $to;
    public $total;

    public static function Instance(){
        return new PaginateModel();
    }

    public function FinalizePaginateModel($returnArray, $getResult){
        $newModel = PaginateModel::Instance();
        $newModel->current_page = $getResult->currentPage();
        $newModel->data = $returnArray;
        $newModel->first_page_url = "";
        $newModel->from = $getResult->firstItem();
        $newModel->last_page = $getResult->lastPage();
        $newModel->last_page_url = "";
        $newModel->url = $getResult->url(0);
        $newModel->next_page_url = $getResult->nextPageUrl();
        $newModel->path = $getResult->url(1);
        $newModel->per_page = $getResult->perPage();
        $newModel->prev_page_url = $getResult->previousPageUrl();
        $newModel->to = $getResult->lastItem();
        $newModel->total = $getResult->total();

        return $newModel;
    }
}