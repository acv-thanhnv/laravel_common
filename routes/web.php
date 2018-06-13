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

/**
 * Dev
 */
Route::group(['namespace' => 'Web','middleware' => ['acl']], function () {
    //Router config here...
    Route::get('/dev', 'DevController@index')->name('testindex');
    Route::get('/dev/translation', 'DevController@translation')->name('translation');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
