<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/11/2018
 * Time: 1:52 PM
 */

namespace App\Http\Controllers\Base\Model\Enum;


class InvoiceStatusEnum
{
    const OPEN = 1;
    const CLOSE = 2;
    const TOOK = 3;

    public const STATUS_ARRAY = array(
        1 => 'មិនទាន់លស់',
        2 => 'លស់ហើយ',
        3 => 'យកដាច់'
    );
}