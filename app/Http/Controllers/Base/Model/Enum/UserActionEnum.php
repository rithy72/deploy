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
    public const ACTIVATE = 4;
    public const DEACTIVATE = 5;

    public const ActionArray = array(
        1 => "បង្កើត",
        2 => "កែប្រែ",
        3 => "លុប",
        4 => "ដំណើរការ",
        5 => "ផ្អាកដំណើរការ"
    );
}