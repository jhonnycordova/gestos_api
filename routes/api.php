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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/gestures', 'GestureController@getGestures');
Route::post('/gestures', 'GestureController@create');
Route::post('/gestures-edit', 'GestureController@update');

Route::get('/gestures-types', 'GestureTypeController@getGestureTypes');
Route::post('/users', 'UserController@create');
Route::post('/convertImage', 'UserController@convertImage');
