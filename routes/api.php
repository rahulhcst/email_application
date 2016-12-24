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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/mail', function (){
    return 'check';
});

Route::get('check', function (){
    return 'check';
});

Route::get('/token', function (){
    return csrf_token();
});

Route::group(['prefix' => 'email'], function (){
    Route::post('/new', 'EmailComposeController@create');
    Route::put('/{id}', 'EmailComposeController@create');
});