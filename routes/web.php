<?php

use App\Http\Middleware\IsAjax;
use Illuminate\Support\Facades\Route;

Route::get('/', 'MainController@index')->name('main');

Route::get('secret-login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('secret-login', 'Auth\LoginController@login');
Route::post('secret-logout', 'Auth\LoginController@logout')->name('logout');

//Route::get('secret-register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//Route::post('secret-register', 'Auth\RegisterController@register');
//
//Route::get('secret-password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//Route::post('secret-password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::get('secret-password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//Route::post('secret-password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//
//Route::get('secret-email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//Route::get('secret-email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
//Route::post('secret-email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

//Route::get('secret-password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
//Route::post('secret-password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::group([
    'namespace' => 'User',
    'middleware' => ['throttle:60,1'],
], function () {

    Route::get('/mmc-200', 'LandingController@mmc200')->name('mmc-200');
    Route::post('/mmc-200-ajax', 'LandingController@mmc200form')->name('mmc-200.ajax')->middleware(IsAjax::class);

    Route::group([
        'namespace' => 'Catalog',
    ], function () {
//        Route::group([
//            'prefix' => 'categories',
//            'as' => 'user.categories.',
//        ], function () {
//            Route::get('/', 'TypeController@index')->name('index');
//            Route::get('/{slug}', 'TypeController@show')->name('show');
//        });

        Route::get('/category/{slug}', 'TagController@show')->name('user.tags.show');
        Route::get('/catalog/{slug}', 'MachineController@show')->name('user.catalog.show');
        Route::post('/order', 'OrderController@order')->middleware([IsAjax::class, 'throttle:10,1'])->name('user.order');
    });
});

Route::group([
    'namespace' => 'User',
    'middleware' => ['throttle:60,1'],
    'as' => config('site.user.routes.prefix.name'),
    'prefix' => config('site.user.routes.prefix.path'),
], function () {

    Route::get('/mmc-200', 'LandingController@mmc200')->name('mmc-200');
    Route::post('/mmc-200-ajax', 'LandingController@mmc200form')->name('mmc-200.ajax')->middleware(IsAjax::class);

    Route::group([
        'namespace' => 'Catalog',
    ], function () {
//        Route::group([
//            'prefix' => 'categories',
//            'as' => 'user.categories.',
//        ], function () {
//            Route::get('/', 'TypeController@index')->name('index');
//            Route::get('/{slug}', 'TypeController@show')->name('show');
//        });

        Route::get('/category/{slug}', 'TagController@show')->name('user.tags.show');
        Route::get('/catalog/{slug}', 'MachineController@show')->name('user.catalog.show');
        Route::post('/order', 'OrderController@order')->middleware([IsAjax::class, 'throttle:10,1'])->name('user.order');
    });
});

Route::group([
    'prefix' => 'admsfsdfsin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'throttle:60,1']
], function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::group([
        'namespace' => 'Catalog',
        'prefix' => 'catalog',
    ], function () {
//        Route::resource('types', 'TypeController')->except('show');
        Route::resource('tag', 'TagController')->except('show');
        Route::resource('properties', 'PropertyController')->except('show');
        Route::resource('machines', 'MachineController');

        Route::post('blog-images', 'ImagesController@upload')->name('images.upload')->middleware(IsAjax::class);
        Route::post('blog-images-delete', 'ImagesController@destroy')->name('images.delete')->middleware(IsAjax::class);
    });

    Route::group([
        'namespace' => 'Blog',
        'as' => 'blog.',
        'prefix' => 'blog',
    ], function () {
        Route::resource('posts', 'PostsController');
        Route::resource('categories', 'CategoriesController')->except('show');
        Route::resource('tags', 'TagsController')->except('show');

        Route::post('post-images', 'ImagesController@upload')->name('images.upload')->middleware(IsAjax::class);
        Route::post('post-images-delete', 'ImagesController@destroy')->name('images.delete')->middleware(IsAjax::class);
    });
});


