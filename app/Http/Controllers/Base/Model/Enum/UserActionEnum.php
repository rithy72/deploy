<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/13/2018
 * Time: 5:30 PM
 */

namespace App\Http\Controllers\Base\Model\Enum;


class UserActionEnum
{
    public const INSERT = 1;
    public const UPDATE = 2;
    public const DELETE = 3;

    public const ActionArray = array(
        1 => "បង្កើតវិក្ក័យបត្រ",
        2 => "កែប្រែពត័មានវិក្ក័យបត្រ",
        3 => "លុបវិក្ក័យបត្រ"
    );
}