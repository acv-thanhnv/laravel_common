<?php


/**
 * Dev mode
 */
//Router config here...
Route::get('/dev', 'DevController@index')->name('testindex');
Route::get('/dev/translationManagement', 'DevController@translationManagement')->name('translationManagement');
Route::get('/dev/readAclConfig', 'DevController@readAclConfig')->name('readAclConfig');
Route::get('/dev/generationAclConfigFiles', 'DevController@generationAclConfigFiles')->name('generationAclConfigFiles');

Route::get('/dev/generationLanguageFiles', 'DevController@generationLanguageFiles')->name('generationLanguageFiles');
Route::get('/dev/importScreensList', 'DevController@importScreensList')->name('importScreensList');
Route::get('/dev/importTranslateToDB', 'DevController@importTranslateToDB')->name('importTranslateToDB');
Route::get('/dev/initProject', 'DevController@initProject')->name('initProject');

