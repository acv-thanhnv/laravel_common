<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/**
 * Default router config
 */
    Route::get('/', function () {
        return view('welcome');
    });
    Auth::routes();

/**
 * Web module
 */
Route::group(['middleware' => ['acl']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

