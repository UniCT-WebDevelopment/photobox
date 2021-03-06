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

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/feed');
    }
    return view('home');
})->name('login');

/* USER */
Route::post('login', 'UserController@login');
Route::post('signin', 'UserController@signin');
Route::get('logout', 'UserController@logout')->middleware('auth');
Route::get('profile', 'UserController@profile')->middleware('auth');
Route::get('guestProfile', 'UserController@guestProfileView')->middleware('auth');
Route::get('editProfileInfo', 'UserController@editProfileInfoView')->middleware('auth');
Route::post('editProfileInfo', 'UserController@editProfileInfo')->middleware('auth');
Route::get('editProfilePhoto', 'UserController@editProfilePhotoView')->middleware('auth');
Route::post('editProfilePhoto', 'UserController@editProfilePhoto')->middleware('auth');
Route::get('deleteAccount', 'UserController@deleteAccount')->middleware('auth');
Route::post('searchUsers', 'UserController@searchUsers')->middleware('auth');

/* FEED */
Route::get('feed', 'FeedController@show')->middleware('auth');
Route::get('feedUploadPhoto', 'FeedController@uploadFeedPhotoView')->middleware('auth');
Route::post('feedUploadPhoto', 'FeedController@uploadFeedPhoto')->middleware('auth');
Route::get('myPhotos', 'FeedController@myPhotosView')->middleware('auth');
Route::get('deletePhoto/{id}', 'FeedController@deletePhoto')->middleware('auth');

/* VOTI */
Route::post('like', 'VotoController@like')->middleware('auth');
Route::post('unlike', 'VotoController@unlike')->middleware('auth');
Route::get('mediaVoti', 'VotoController@getMediaVoti')->middleware('auth');
Route::get('trendPost', 'VotoController@getTrendPost')->middleware('auth');