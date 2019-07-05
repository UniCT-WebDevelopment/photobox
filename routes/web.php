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
Route::get('login', 'UserController@login');
Route::get('signin', 'UserController@signin');
Route::get('profile', 'UserController@profile');
Route::get('modify', 'UserController@modify');

/* FEED */
Route::get('feed', 'FeedController@show');