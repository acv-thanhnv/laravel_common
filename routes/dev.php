<?php


/**
 * Dev mode
 */
//Router config here...
Route::get('/dev', 'DevController@index')->name('index');
Route::get('/dev/test', 'DevController@test')->name('test');
Route::get('/dev/translationManagement', 'DevController@translationManagement')->name('translationManagement');
Route::get('/dev/readAclConfig', 'DevController@readAclConfig')->name('readAclConfig');
Route::get('/dev/generationAclConfigFiles', 'DevController@generationAclConfigFiles')->name('generationAclConfigFiles');


Route::post('/dev/importScreensList', 'DevController@importScreensList')->name('importScreensList');

Route::post('/dev/initProject', 'DevController@initProject')->name('initProject');

Route::get('/dev/translation', 'DevController@translationManagement')->name('translationManagement');
Route::get('/dev/acl', 'DevController@aclManangement')->name('aclManangement');
Route::get('/dev/menu', 'DevController@menu')->name('menu');

Route::post('/dev/updateAclActive', 'DevController@updateAclActive')->name('updateAclActive');

Route::post('/dev/generationAclFile', 'DevController@generationAclFile')->name('generationAclFile');

Route::post('/dev/updateTranslate', 'DevController@updateTranslate')->name('updateTranslate');

Route::post('/dev/generationLanguageFiles', 'DevController@generationLanguageFiles')->name('generationLanguageFiles');

Route::post('/dev/importTranslateToDB', 'DevController@importTranslateToDB')->name('importTranslateToDB');
Route::any('/dev/newTextTrans', 'DevController@newTextTrans')->name('newTextTrans');
Route::any('/dev/createNewTranslationItem', 'DevController@createNewTranslationItem')->name('createNewTranslationItem');

Route::get('/dev/testvalidate', 'DevController@testCustomValidate')->name('testCustomValidate');
