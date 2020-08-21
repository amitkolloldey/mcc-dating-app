<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')->name('home');
Route::get('user/profile/{user}', 'MyAccountController@profile')->name('user_profile');

Route::middleware(['auth', 'access_own_content'])->group(function () {
    Route::get('/my/matches/', 'MyAccountController@matches')->name('my_matches');
    Route::get('/find/my/matches/', 'MyAccountController@findMatches')->name('find_my_matches');
    Route::get('/my/settings/', 'MyAccountController@settings')->name('my_settings');
    Route::post('/change/my/image/', 'MyAccountController@changeImage')->name('change_image');
    Route::post('/change/my/settings/', 'MyAccountController@changeSettings')->name('change_settings');
    Route::post('/like/my/match/', 'MyAccountController@likeSomeone')->name('like_someone');
    Route::post('/dislike/my/match/', 'MyAccountController@dislikeSomeone')->name('dislike_someone');
    Route::post('/mark/as/read/', 'HomeController@markAsRead')->name('mark_as_read');
});

Auth::routes(['verify' => true]);

