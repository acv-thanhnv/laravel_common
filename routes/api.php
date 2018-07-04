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
Route::get('/some', 'SomeController@index')->name('testindex');
Route::get('/api/blog', 'BlogController@index')->name('api.blog');
//Route::get('/api/login', 'LoginController@showLoginForm')->name('login');

