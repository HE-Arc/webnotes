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

Route::get('/account', 'AccountController@viewAccount');

// Group of routes for GROUP
Route::group(array('prefix' => 'group/'), function()
{
    Route::get('', 'GroupsController@index');
    Route::get('create', 'GroupsController@create');
    Route::post('', 'GroupsController@store');
    Route::get('{group}', 'GroupsController@show');
});

// Group of routes for NOTES
Route::group(array('prefix' => 'notes/'), function()
{
    Route::get('', 'NotesController@index');
    Route::get('create', 'NotesController@create');
    Route::post('', 'NotesController@store');
    Route::get('{group}', 'NotesController@show');
});
