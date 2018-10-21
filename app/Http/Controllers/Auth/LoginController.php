<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    protected function redirectTo()
    {
        $userObj = UserLogic::Instance()->Find(Auth::id());
        $role = strtolower($userObj->role);
        if ($userObj->deleted == 1 || $userObj->status == 0)
            return '/login';
        if ($role == UserRoleEnum::ADMIN){
            return '/admin/mainform';
        }elseif ($role == UserRoleEnum::USER){
            return '/admin/invoice';
        }
        return '/login';
    }

}
