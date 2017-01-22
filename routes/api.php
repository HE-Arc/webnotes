<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/user', 'ApiAccountController@index');
Route::get('/user/{user}/groups', 'ApiAccountController@groups');
Route::get('/user/{user}/notes', 'ApiAccountController@notes');
Route::post('/user/authUser', 'ApiAccountController@authUser');
Route::post('/user/{user}', 'ApiAccountController@update');

Route::get('/group/{group}', 'ApiGroupController@show');
Route::get('/group/{group}/users', 'ApiGroupController@users');
Route::post('/group', 'ApiGroupController@store');
Route::post('/group/{group}', 'ApiGroupController@update');
Route::post('/group/{group}/addUser', 'ApiGroupController@addUser');

Route::get('/note', 'ApiNotesController@index');
Route::get('/note/{note}', 'ApiNotesController@show');
Route::post('/note/{note}', 'ApiNotesController@update');
Route::post('/note', 'ApiNotesController@store');
