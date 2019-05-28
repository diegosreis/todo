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

Route::group(['prefix' => 'todo'], function () {
    Route::get('/', 'TodoController@index');
    Route::post('', 'TodoController@store');
    Route::post('/set-done/{id}', 'TodoController@setDone');
    Route::put('/{id}', 'TodoController@update');
    Route::delete('/{id}', 'TodoController@destroy');
    route::post('/delete-all', 'TodoController@deleteAll');
    route::post('/delete-done', 'TodoController@deleteAllDone');
});

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
