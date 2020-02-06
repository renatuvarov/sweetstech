<?php

use App\Http\Middleware\IsAjax;
use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');

Route::get('secret-login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('secret-login', 'Auth\LoginController@login');
Route::post('secret-logout', 'Auth\LoginController@logout')->name('logout');

Route::get('secret-register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('secret-register', 'Auth\RegisterController@register');

Route::get('secret-password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('secret-password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('secret-password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('secret-password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

Route::get('secret-email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('secret-email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::post('secret-email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Route::get('secret-password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//Route::post('secret-password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::get('/mmc-200', 'User\LandingController@mmc200')->name('mmc-200');
Route::post('/mmc-200-ajax', 'User\LandingController@mmc200form')
    ->name('mmc-200.ajax')
    ->middleware(IsAjax::class);

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['verified:main',]
], function () {
    Route::get('home', 'HomeController@index')->name('home');
});


