<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/11/2018
 * Time: 1:48 PM
 */

namespace App\Http\Controllers\Base\Model\Enum;

class GeneralStatus
{
    const ACTIVE = "active";
    const INACTIVE = "inactive";

    public const DisplayStatus = array(
      0 => "ផ្អាកដំណើរការ",
      1 => "ដំណើរការ"
    );
}