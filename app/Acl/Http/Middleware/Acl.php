<?php
/**
 * @author thanhnv
 */
namespace App\Acl\Http\Middleware;
use App\Core\Helpers\ResponseHelper;
use App\Core\Entities\DataResultCollection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
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
        $publicRole = Config::get('app.PUBLIC_ROLE_VALUE');
        $roleId = $publicRole;
        if(Auth::check()){
            $roleId = Auth::user()->role_value;
        }
        $curentActionInfo = Route::getCurrentRoute()->getAction();
        $module = strtolower(trim(str_replace('App\\', '', $curentActionInfo['namespace']), '\\'));
        $module =  explode("\\",$module)[0];
        $_action =isset($curentActionInfo['controller'])? explode('@', $curentActionInfo['controller']):array();
        $_namespaces_chunks =isset($_action[0])? explode('\\', $_action[0]):array();
        $controllers = strtolower(end($_namespaces_chunks));
        $action = strtolower(end($_action));
        $screenCode = $module.'\\'.$controllers.'\\'.$action;

        if ($this->hasAcl($roleId,$screenCode)==true ) {
            return $next($request);
        }
        if($module!=\ApiConst::ApiModuleName){
            return redirect('/');
        }else{
            $result = new DataResultCollection();
            $result->status = \SDBStatusCode::ACLNotPass;
            $result->data=array('error'=> trans('acl_not_access'));
            return ResponseHelper::JsonDataResult($result);
        }

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
