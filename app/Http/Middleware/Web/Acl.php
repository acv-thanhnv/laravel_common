<?php

namespace App\Http\Middleware\Web;
use Illuminate\Support\Facades\Route;
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


        return $next($request);
        if (isset($_SESSION['role_id']) && hasAcl($_SESSION['role_id'])==true ) {
            return $next($request);
        }
        return redirect('/home');
    }
    protected function hasAcl($roleId){
        return true;
    }
}
