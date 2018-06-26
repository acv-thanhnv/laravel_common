<?php

namespace App\Web\Http\Controllers;
use Illuminate\Support\Facades\Route;

class SomeController extends Controller
{
    public function index(){
        echo '<pre>';
        $controllers = [];
        $i = 0;
        $id = 0;
        $listRouter = Route:: getRoutes()->getRoutes();
        foreach ($listRouter as $route) {
            $action = $route->getAction();
            if (array_key_exists('controller', $action)) {
                $_module = strtolower(trim(str_replace('App\\', '', $action['namespace']), '\\'));
                $_module =  explode("\\",$_module)[0];
                if ($_module != 'dev') {
                    $id++;
                    $_action = explode('@', $action['controller']);

                    $_namespaces_chunks = explode('\\', $_action[0]);
                    $controllers[$i]['id'] = $id;
                    $controllers[$i]['module'] = $_module;
                    $controllers[$i]['controller'] = strtolower(end($_namespaces_chunks));
                    $controllers[$i]['action'] = strtolower(end($_action));
                }

            }
            $i++;
        }
        print_r($controllers);
        echo 'web/some/index';
    }
}
