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
    Route::get('/login', function () {
        return view('auth/login');
    });
    Route::post('/login', 'Auth\AuthController@login');
    Route::get('/register', function () {
        return view('auth/register');
    });
    Route::post('/register', 'Auth\AuthController@register');
    Route::get('/login/google', 'Auth\GoogleAuthController@redirectToProvider');
    Route::get('/login/google/callback', 'Auth\GoogleAuthController@handleProviderCallback');
});

Route::get('/', 'User\PartnerController@view');
Route::get('/profile/{user?}', 'User\UserController@profile')->where('user', '[0-9]+');
Route::get('/partner', 'User\PartnerController@overview');
Route::get('/partner/{id}', 'User\PartnerController@partner');

Route::group(['middleware' => ['isSignIn']], function () {
    Route::group(['middleware' => ['verified']], function () {
    });
});

//* Manual route for email verification *//
Route::group(['middleware' => ['isSignIn']], function () {
    Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});
Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('/verified', function () {
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

Route::get('/logout', 'Auth\AuthController@logout');
