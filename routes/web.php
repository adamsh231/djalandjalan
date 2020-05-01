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
    Route::group(['middleware' => ['verified']], function () {
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
});

//* Manual route for email verification *//
Route::group(['middleware' => ['isSignIn']], function () {
    Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});
Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('/verified', function(){
    return view('auth/verified');
})->middleware('guest');

//! Note for Future to turn on/off default Route in Router.php
// Auth::routes(
//     [
//         'register' => false,
//         'reset' => false,
//         'confirm' => false,
//         'verify' => true,
//     ]
// );

Route::get('/logout', 'AuthController@logout');
