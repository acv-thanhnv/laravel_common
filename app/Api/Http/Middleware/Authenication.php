<?php
/**
 * @author thanhnv
 */
namespace App\Api\Http\Middleware;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Closure;
use Session;

class Authenication
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
        if($this->hasLoged($request->input(\ApiConst::ApiLoginTokenName)))
            return $next($request);
        $result = array(
            'status'=>'false',
            'message'=>'Login failured Middleware',
            'sesssion'=>Session::get(\ApiConst::ApiLoginTokenName),
            '$token'=>$request->input(\ApiConst::ApiLoginTokenName)
        );
        return json_encode($result);
    }

    /**
     * @param $roleId
     * @param $screenCode
     * @return bool
     * validate has role
     */
    protected function hasLoged($token){
        if(isset($token)&&Session::get('api_login_token')==$token){
            return true;
        }
        return false;
    }
}
