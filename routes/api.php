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
Route::match(array('GET','POST'),'/api/auth/login', 'Auth\UserController@login')->name('api_login_call');

Route::group(['middleware' => [ 'auth:api' ]],function (){
    Route::get('/api/catelory/all', 'CateloryController@index');
    Route::match(array('GET','POST'),'/api/auth/logout', 'Auth\UserController@logout')->name('api_logout_call');
});


