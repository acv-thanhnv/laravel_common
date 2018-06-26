<?php

namespace App\Web\Http\Controllers;
use Illuminate\Support\Facades\Route;

class SomeController extends Controller
{
    public function index(){
        echo '<pre>';
        \App\Core\Dao\SDB::execSPsToDataResultCollection('dsdsd');
        echo 'web/some/index';
    }
}
