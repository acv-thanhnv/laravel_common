<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Api routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your Api!
|
*/
Route::post('/api/auth/register', 'Auth\UserController@register');
Route::match(array('GET','POST'),'/api/auth/login', 'Auth\UserController@login');
Route::group(['middleware' => [ 'auth:api' ]],function (){
    Route::get('/api/user-info', 'Auth\UserController@getUserInfo');
    Route::get('/api/catelory/all', 'CateloryController@index');
});


