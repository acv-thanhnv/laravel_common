<?php


/**
 * Dev mode
 */
//Router config here...
Route::get('/dev', 'DevController@index')->name('index');
Route::get('/dev/translationManagement', 'DevController@translationManagement')->name('translationManagement');
Route::get('/dev/readAclConfig', 'DevController@readAclConfig')->name('readAclConfig');
Route::get('/dev/generationAclConfigFiles', 'DevController@generationAclConfigFiles')->name('generationAclConfigFiles');

Route::get('/dev/generationLanguageFiles', 'DevController@generationLanguageFiles')->name('generationLanguageFiles');
Route::get('/dev/importScreensList', 'DevController@importScreensList')->name('importScreensList');
Route::get('/dev/importTranslateToDB', 'DevController@importTranslateToDB')->name('importTranslateToDB');
Route::get('/dev/initProject', 'DevController@initProject')->name('initProject');

Route::get('/dev/translation', 'DevController@translationManagement')->name('translationManagement');
Route::get('/dev/acl', 'DevController@aclManangement')->name('aclManangement');
Route::get('/dev/menu', 'DevController@menu')->name('menu');

