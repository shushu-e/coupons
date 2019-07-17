<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'WelcomeController@index');

// ユーザ登録
Route::get('signup', 'Auth\AuthController@getRegister')->name('signup.get');
Route::post('signup', 'Auth\AuthController@postRegister')->name('signup.post');

// ログイン認証
Route::get('login', 'Auth\AuthController@getLogin')->name('login.get');
Route::post('login', 'Auth\AuthController@postLogin')->name('login.post');
Route::get('logout', 'Auth\AuthController@getLogout')->name('logout.get');

// ログインしているユーザのみ
Route::group(['middleware' => 'auth'], function () {
    Route::resource('coupons', 'CouponsController', ['only' => ['store', 'destroy', 'create', 'edit', 'update', 'show']]);  //createはクーポン新規登録のフォームページ
    Route::get('/csv_file', 'CouponsController@showImportCSV')->name('/csv_file.get');
    Route::post('/csv_file', 'CouponsController@importCSV')->name('/csv_file.post');
});