<?php

namespace App\Api\Http\Controllers;
use Session;
class BlogController extends Controller
{
    public function index(){

        echo 'OK';
        dd(Session::all());
        //echo Session::get(\ApiConst::ApiLoginTokenName);
    }
}
