<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 9/10/2018
 * Time: 1:27 PM
 */

namespace App\Http\Controllers\Base\Model {

    //Invoice Status Enum
    class InvoiceStatusEnum{
        const OPEN = 1;
        const CLOSE = 2;
        const TOOK = 3;
    }

    //Invoice Item Status Enum
    class InvoiceItemStatusEnum{
        const OPEN = 1;
        const CLOSE = 2;
        const TOOK = 3;
        const SOLD = 4;
    }

    //Transaction Type Enum
    class TransactionTypeEnum{
        const INTERESTS_PAYMENT = 1;
        const PAY_FOR_ORIGINAL_COST = 2;
        const ADD_ON = 3;
    }

    //General Status
    class GeneralStatus{
        const ACTIVE = true;
        const INACTIVE = false;
    }

}