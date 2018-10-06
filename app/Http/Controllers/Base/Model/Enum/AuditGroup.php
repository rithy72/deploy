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
    //Audit Group
    public const INVOICE = 1;
    public const ITEM_TYPE = 2;
    public const USER = 3;
    public const ITEM = 4;
    //Field
    public const CUSTOMER_NAME = 5;
    public const PHONE = 6;
    public const INTEREST_RATE = 7;
    public const ITEM_TYPE_NAME = 8;
    public const INVOICE_ITEM = 9;
    public const GRAND_COST = 10;
    public const REMAIN_COST = 11;
    //
    public const USER_NUMBER = 12;
    public const USER_FULLNAME = 13;
    public const NOTE = 14;
    public const USERNAME = 15;
    public const PASSWORD = 16;
    public const USER_ROLE = 17;

    public const AUDIT_GROUP_STRING = array(
        1 => "វិក្ក័យប័ត្រ",
        2 => "ប្រភេទទំនិញ",
        3 => "អ្នកប្រើប្រាស់",
        4 => "ទំនិញ",
        5 => "ឈ្មោះអតិថិជន",
        6 => "ទូរស័ព្ទ",
        7 => "ការប្រាក់",
        8 => "ឈ្មោះប្រភេទទំនិញ",
        9 => "ទំនិញ",
        10 => "ប្រាក់ដើម",
        11 => "ប្រាក់ដើមសល់",
        12 => "លេខសម្គាល់",
        13 => "ឈ្មោះអ្នកប្រើប្រាស់",
        14 => "កំណត់ចំនាំ",
        15 => "គណនីចូលប្រព័ន្ឋ",
        16 => "លេខសម្ងាត់",
        17 => "តួនាទី"
    );

}