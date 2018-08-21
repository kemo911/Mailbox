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

Route::get('/messages',['uses'=>'MessagesController@getMessages']);
Route::get('/messages/archived',['uses'=>'MessagesController@getArchivedMessages']);
Route::get('/message/show',['uses'=>'MessagesController@showMessage']);
Route::get('/message/read',['uses'=>'MessagesController@readMessage']);
Route::get('/message/archive',['uses'=>'MessagesController@archiveMessage']);


