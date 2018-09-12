<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/11/2018
 * Time: 1:51 PM
 */

namespace App\Http\Controllers\Base\Model\Enum;


class InvoiceItemStatusEnum
{
    const OPEN = 1;
    const CLOSE = 2;
    const TOOK = 3;
    const SOLD = 4;

    public static $StatusArray = [
      1 => "មិនទាន់លស់",
      2 => "លស់",
      3 => "យកដាច់",
      4 => "លក់ចេញ"
    ];
}