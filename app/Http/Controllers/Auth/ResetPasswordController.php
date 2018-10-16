<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:6',
        ];
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse($response)
    {
        $userObj = UserLogic::Instance()->Find(Auth::id());
        $role = strtolower($userObj->role);
        //Audit Trail
        $description = $userObj->user_no."-".$userObj->name;
        UserAuditLogic::Instance()->UserOnUserAction($userObj->id, UserActionEnum::CHANGE_PASSWORD, $description, []);
        //Prep User
        $rememberToken = UserLogic::Instance()->UserPreps($userObj->email);
        Auth::user()->remember_token = $rememberToken;
        //Redirect after success
        if ($role == UserRoleEnum::ADMIN){
            return redirect('/admin/mainform')
                ->with('status', trans($response));
        }else{
            return redirect('/admin/invoice')
                ->with('status', trans($response));
        }
    }
}
