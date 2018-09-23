<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/17/2018
 * Time: 8:12 PM
 */

namespace App\Http\Controllers\Base\Model\Enum;


class AuditGroup
{
    public const INVOICE = 1;
    public const ITEM_TYPE = 2;
    public const USER = 3;
    public const ITEM = 4;

    public const AUDIT_GROUP_STRING = array(
        1 => "វិក្ក័យប័ត្រ",
        2 => "ប្រភេទទំនិញ",
        3 => "អ្នកប្រើប្រាស់",
        4 => "ទំនិញ"
    );

    //Field
    public const CUSTOMER_NAME = 1;
    public const PHONE = 2;
    public const INTEREST_RATE = 3;

    public const FIELD_STRING = array(
        1 => "ឈ្មោះអតិថិជន",
        2 => "ទូរស័ព្ទ",
        3 => "ការប្រាក់",
    );
}