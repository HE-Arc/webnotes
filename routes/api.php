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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');


Route::get('/user', 'ApiAccountController@index');
Route::post('/user/authUser', 'ApiAccountController@authUser');
Route::get('/user/{user}/groups', 'ApiAccountController@groups');
Route::get('/user/{user}/notes', 'ApiAccountController@notes');

Route::get('/group/{group}', 'ApiGroupController@show');
Route::get('/group/{group}/users', 'ApiGroupController@users');
Route::post('/group/{group}', 'ApiGroupController@update');
Route::post('/group/{group}/addUser', 'ApiGroupController@addUser');

Route::get('/note', 'ApiNotesController@index');
//Route::get('/note/{note}', 'ApiNotesController@show');

Route::resource('apiAccount', 'ApiAccountController');
