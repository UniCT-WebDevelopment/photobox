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
    return view('home');
});

/* USER */
Route::post('login', 'UserController@login');
Route::post('signin', 'UserController@signin');
Route::get('profile', 'UserController@profile');
Route::get('modify', 'UserController@modify');
Route::post('modify', 'UserController@editProfile');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [
        'uses' => 'Auth\AuthController@getLogout',
        'as' => 'logout'
    ]);
});

/* FEED */
Route::get('feed', 'FeedController@show');