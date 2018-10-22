<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Base\Logic\OtherLogic\UserAndResetPasswordToken;
use App\Http\Controllers\Base\Logic\UserLogic;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserMiddleware
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user() == null) return redirect('/login');
        //
        $userObj = UserLogic::Instance()->Find(Auth::id());
        //
        if ($userObj->just_update == true || $userObj->status == false || $userObj->deleted == true){
            Auth::logout();
            Session::flush();
            return redirect('/login');
        }
        //
        Auth::user()
            ->setRememberToken(UserAndResetPasswordToken::Instance()->UserPreps($userObj->email, $userObj->username));
        //
        return $next($request);
    }
}