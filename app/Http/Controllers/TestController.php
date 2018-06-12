<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Dao\SDB;
class TestController extends Controller
{
    public function index()
    {
        $a = SDB::execSPs('Users_LST',array('1','2'));
        echo '<pre>';
        print_r($a);
        return view("test");
    }


}
