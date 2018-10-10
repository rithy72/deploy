<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Base\Logic\UserLogic;
use App\Http\Controllers\Base\Model\Other\ReturnModel;
use Closure;
use Illuminate\Support\Facades\Auth;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $userObj = UserLogic::Instance()->Find(Auth::id());
        if ($userObj->status == false || $userObj->deleted == true){
            $returnModel = ReturnModel::Instance();
            $returnModel->status = "450";
            $returnModel->data = "Unauthorized Request";
            return response(json_encode($returnModel), 200);
        }

        return $next($request);
    }
}
