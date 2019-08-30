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
})->name('login');

/** USER **/
Route::post('login', 'UserController@login');
Route::post('signin', 'UserController@signin');
Route::get('logout', 'UserController@logout')->middleware('auth');

Route::get('profile', 'UserController@profile')->middleware('auth');

Route::get('editProfileInfo', 'UserController@editProfileInfoView')->middleware('auth');
Route::post('editProfileInfo', 'UserController@editProfileInfo')->middleware('auth');

Route::get('editProfilePhoto', 'UserController@editProfilePhotoView')->middleware('auth');
Route::post('editProfilePhoto', 'UserController@editProfilePhoto')->middleware('auth');

/** FEED **/
Route::get('feed', 'FeedController@show');