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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('login');
    });
    Route::post('/login', 'AuthController@login');
    Route::get('/register', function () {
        return view('register');
    });
    Route::post('/register', 'AuthController@register');
    Route::get('/login/google', 'GoogleAuthController@redirectToProvider');
    Route::get('/login/google/callback', 'GoogleAuthController@handleProviderCallback');
});

Route::group(['middleware' => ['isSignIn']], function () {
    Route::get('/home', function () {
        return view('user/home');
    });
    Route::get('/profile', function () {
        return view('user/profile');
    });
    Route::get('/partner', function () {
        return view('user/partner');
    });
    Route::get('/thread', function () {
        return view('user/thread');
    });
});

Route::get('/logout', 'AuthController@logout');
