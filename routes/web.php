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
    Route::get('/accountSettings', 'AccountController@accountSettings');
    Route::get('/overview', 'AccountController@overview');
    Route::get('/delete', 'AccountController@deleteAccount');
    Route::get('/help', 'AccountController@getHelp');
});

<<<<<<< HEAD
// Group of routes for NOTES
Route::group(array('prefix' => 'notes/'), function()
{
    Route::get('', 'NotesController@index');
    Route::get('create', 'NotesController@create');
    Route::post('', 'NotesController@store');
    Route::get('{group}', 'NotesController@show');
});
=======

Route::resource('/group', 'GroupController');

>>>>>>> 04c39d231c6fb7e9a10a0447f17b7895c62acbc2
