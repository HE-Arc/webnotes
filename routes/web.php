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

Route::get('/notetest', 'NotesController@test');

Route::get('/welcome', 'PagesController@index');

Route::get('/account', 'AccountController@viewAccount');

Route::resource('/group', 'GroupController');

