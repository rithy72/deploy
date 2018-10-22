<?php
/**
 * Created by PhpStorm.
 * User: Sothea
 * Date: 10/7/2018
 * Time: 11:32 PM
 */

namespace App\Listeners;


use App\Http\Controllers\Base\Logic\OtherLogic\UserAndResetPasswordToken;
use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Event;

class LoginSuccessListener
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
     * @param  Event  $event
     */
    public function handle(Login $event)
    {
        //
        UserAuditLogic::Instance()->UserSecurityAction(Auth::id(), UserActionEnum::LOGIN, "", []);
        //
        $rememberToken = UserAndResetPasswordToken::Instance()->UserPreps(Auth::user()->email, Auth::user()->username);
        //
        Auth::user()->setRememberToken($rememberToken);
        //


    }
}