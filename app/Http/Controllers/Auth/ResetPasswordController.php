<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Base\Logic\OtherLogic\UserAndResetPasswordToken;
use App\Http\Controllers\Base\Logic\UserAuditLogic;
use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Enum\UserActionEnum;
use App\Http\Controllers\Base\Model\Enum\UserRoleEnum;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
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
        if (Auth::user() == null){
            return [
                'token' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed|min:6',
            ];
        }else{
            return [
                'token' => 'required',
                'username' => 'required',
                'password' => 'required|confirmed|min:6',
            ];
        }

    }


    /**
     * Get the password reset credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        if (Auth::user() == null){
            return $request->only(
                'email', 'password', 'password_confirmation', 'token'
            );
        }else{
            return $request->only(
                'username', 'password', 'password_confirmation', 'token'
            );
        }
    }

    /**
     * Get the response for a failed password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
            ->withInput($request->only('username'))
            ->withErrors(['username' => trans($response)]);
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param  string  $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse($response)
    {
        if (Auth::user() == null){
            return redirect($this->redirectPath())
                ->with('status', trans($response));
        }else{
            $userObj = UserLogic::Instance()->Find(Auth::id());
            $role = strtolower($userObj->role);
            //Audit Trail
            $description = $userObj->user_no."-".$userObj->name;
            UserAuditLogic::Instance()->UserOnUserAction($userObj->id, UserActionEnum::CHANGE_PASSWORD, $description, []);
            //Prep User
            $rememberToken = UserAndResetPasswordToken::Instance()->UserPreps($userObj->email, $userObj->username);
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
}
