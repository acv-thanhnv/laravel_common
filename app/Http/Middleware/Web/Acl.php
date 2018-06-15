<?php

namespace App\Http\Middleware\Web;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use Closure;

class Acl
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
        $curentActionInfo = Route::getCurrentRoute()->getAction();
        $module = strtolower(trim(str_replace('App\Http\Controllers', '', $curentActionInfo['namespace']), '\\'));
        $_action = explode('@', $curentActionInfo['controller']);
        $_namespaces_chunks = explode('\\', $_action[0]);
        $controllers = strtolower(end($_namespaces_chunks));
        $action = strtolower(end($_action));
        $screenCode = $module.'\\'.$controllers.'\\'.$action;
        $roleId = null;
        if(Auth::check()){
            $roleId = Auth::user()->role_value;
        }
        if ($this->hasAcl($roleId,$screenCode)==true ) {
            return $next($request);
        }
        return redirect('/');
    }

    /**
     * @param $roleId
     * @param $screenCode
     * @return bool
     * validate has role
     */
    protected function hasAcl($roleId,$screenCode){
        $configAcl = Config::get('acl');
        if(isset($configAcl[$roleId])&& isset($configAcl[$roleId][$screenCode]) && $configAcl[$roleId][$screenCode]==1){
            return true;
        }
        return false;
    }
}
