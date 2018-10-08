<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/6/2018
 * Time: 10:54 PM
 */

namespace App\Http\Controllers\Base\Model\Enum;


class UserSearchOptionEnum
{
    public const USER_NUMBER = 1;
    public const USER_FULLNAME = 2;
    public const USER_PHONE = 3;

    public const UserSearchColumns = array(
      1 => "user_no",
      2 => "name",
      3 => "phone_number"
    );
}