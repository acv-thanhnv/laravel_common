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
Route::get('/home', 'HomeController@index')->name('home');

/**
 * Dev
 */
Route::group(['namespace' => 'Web','middleware' => ['acl']], function () {
    //Router config here...
    Route::get('/dev', 'DevController@index')->name('testindex');
    Route::get('/dev/translationManagement', 'DevController@translationManagement')->name('translationManagement');
    Route::get('/dev/readAclConfig', 'DevController@readAclConfig')->name('readAclConfig');
    Route::get('/dev/generationAclConfigFiles', 'DevController@generationAclConfigFiles')->name('generationAclConfigFiles');

    Route::get('/dev/generationLanguageFiles', 'DevController@generationLanguageFiles')->name('generationLanguageFiles');
    Route::get('/dev/importScreensList', 'DevController@importScreensList')->name('importScreensList');

});

