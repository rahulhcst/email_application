<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/token', function (){
    return csrf_token();
});

//Route::get('email/new', 'EmailComposeController@create');

Route::group(['prefix' => 'email', 'middleware' => 'auth'],function (){
    //Route::post('/new', 'EmailComposeController@create');
    Route::post('/new', 'EmailComposeController@create');
    Route::put('/{id}', 'EmailComposeController@update');

});

Route::get('inbox', 'InboxController@showAll');