<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/mmc-200', 'User\LandingController@mmc200')->name('mmc-200');
Route::post('/mmc-200-ajax', 'User\LandingController@mmc200form')
    ->name('mmc-200.ajax')
    ->middleware(\App\Http\Middleware\IsAjax::class);

//Route::group([
//    'prefix' => 'admin',
//    'as' => 'admin.',
//    'namespace' => 'Admin',
//    'middleware' => ['can:admin-panel',]
//], function () {
//
//});


