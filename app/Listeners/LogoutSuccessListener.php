<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/8/2018
 * Time: 12:03 AM
 */

namespace App\Listeners;


use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class LogoutSuccessListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        //
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  $event
     */
    public function handle(Logout $event)
    {
        DB::table('users')
            ->where('id','=', Auth::id())
            ->update(['remember_token' => null]);
        //
        UserAuditLogic::Instance()->UserSecurityAction(Auth::id(), UserActionEnum::LOGOUT, "", []);
    }
}