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

//* --------------------------------- Public Access --------------------------------------- *//

Route::get('/', 'User\PartnerController@view');
Route::get('/profile/{user}', 'User\UserController@profile')->where('user', '[0-9]+');
Route::get('/partner', 'User\PartnerController@overview');
Route::get('/partner/{id}', 'User\PartnerController@partner');

//* --------------------------------------------------------------------------------------- *//

//* --------------------------------- Guest Access --------------------------------------- *//

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

//* --------------------------------------------------------------------------------------- *//

//* --------------------------------- User Access --------------------------------------- *//

Route::group(['middleware' => ['isSignIn']], function () {
    Route::get('/logout', 'Auth\AuthController@logout');

    //* --------------- Verified Email Access ----------------- *//

    Route::group(['middleware' => ['verified']], function () {
        Route::get('/profile', 'User\UserController@profile');
        Route::post('/partner/{partner}/comment', 'User\CommentController@newComment');
        Route::post('/partner/{partner}/comment/{comment}/reply', 'User\CommentController@newReply');
    });

    //* ------------------------------------------------------ *//
});

//* --------------------------------------------------------------------------------------- *//

//* ------------------------------ Email Verification -------------------------------------- *//

Route::group(['middleware' => ['isSignIn']], function () {
    Route::get('/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::post('/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});
Route::get('/email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('/verified', function () {
    return view('auth/verified');
})->middleware('guest');

//* --------------------------------------------------------------------------------------- *//
