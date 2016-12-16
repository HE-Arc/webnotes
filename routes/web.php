<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/welcome', 'PagesController@index');

Route::group(array('prefix' => 'account/'), function(){
    Route::get('', 'AccountController@viewAccount');
    Route::get('accountSettings', 'AccountController@accountSettings');
    Route::get('overview', 'AccountController@overview');
    Route::get('delete', 'AccountController@deleteAccount');
    Route::get('help', 'AccountController@getHelp');
    Route::get('resetPass', 'AccountController@getResetPass');
    Route::patch('{user}', 'AccountController@update');
    Route::patch('passUpdate/{user}', 'AccountController@updatePass');
});

Route::resource('/notes', 'NotesController');
Route::post('/releases', 'NoteReleasesController@store');
Route::resource('/group', 'GroupController');

Route::get('/searchusers', 'GroupController@users');
Route::get('/searchgroups', 'NotesController@groups');
