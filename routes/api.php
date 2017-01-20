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

Route::get('/group', 'ApiGroupController@index');
Route::get('/group/{group}', 'ApiGroupController@show');
Route::get('/group/{group}/users', 'ApiGroupController@users');
Route::post('/group/{group}', 'ApiGroupController@update');

Route::get('/note', 'ApiNotesController@index');
//Route::get('/note/{note}', 'ApiNotesController@show');
//Route::get('/note/{user}/notes', 'ApiNotesController@notes');

Route::resource('apiAccount', 'ApiAccountController');
