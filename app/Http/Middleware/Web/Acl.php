<?php

namespace App\Http\Middleware\Web;

use Closure;

class Acl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
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
