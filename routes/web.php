<?php

use App\Http\Middleware\ImageExists;
use App\Http\Middleware\IsAjax;
use App\Http\Middleware\PreferredLanguage;
use App\Http\Middleware\RecaptchaMiddleware;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => ['throttle:60,1', PreferredLanguage::class],
], function () {
    Route::get('/', 'MainController@index')->name('main');
    Route::get('/ru', 'MainController@index')->name('ru.main');

    Route::redirect('category/the-new-equipment/', '/catalog')->name('redirect.new');
    Route::redirect('ru/category/the-new-equipment/', '/catalog')->name('ru.redirect.new');
});

Route::get('secfggdfgret-login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('secfggdfgret-login', 'Auth\LoginController@login');
Route::post('secfggdfgret-logout', 'Auth\LoginController@logout')->name('logout');

Route::post('contact-form', 'ContactController@index')->name('user.contact-form')->middleware([IsAjax::class, RecaptchaMiddleware::class, 'throttle:5,1']);
Route::post('ru/contact-form', 'ContactController@index')->name('ru.user.contact-form')->middleware([IsAjax::class, RecaptchaMiddleware::class, 'throttle:5,1']);

Route::group([
    'namespace' => 'User',
    'as' => 'user.',
    'middleware' => ['throttle:60,1', PreferredLanguage::class],
], function () {

    Route::get('equipment/{slug}', 'LandingController@index')->name('landing');

    Route::group([
        'namespace' => 'Catalog',
        'prefix' => 'catalog',
    ], function () {
        Route::get('/equipment/{slug}', 'MachineController@show')->name('catalog.show');
        Route::get('/{type?}', 'MachineController@index')->name('catalog.index');
        Route::get('category/{slug}/{type?}', 'TagController@show')->name('tags.show');
        Route::get('manufacturer/{slug}/{type?}', 'ManufacturerController@show')->name('manufacturer.show');
        Route::post('order/{slug}', 'OrderController@order')->middleware([RecaptchaMiddleware::class, 'throttle:10,1'])->name('order');
    });

    Route::group([
        'namespace' => 'Blog',
        'prefix' => 'blog',
        'as' => 'blog.',
    ], function () {
        Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
        Route::get('tags/{slug}', 'TagController@show')->name('tags.show');
        Route::get('/', 'PostController@index')->name('news.index');
        Route::get('/{slug}', 'PostController@show')->name('news.show');
    });

    Route::group([
        'namespace' => 'Exhibitions',
        'prefix' => 'exhibitions',
        'as' => 'exhibitions.',
    ], function () {
        Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
        Route::get('tags/{slug}', 'TagController@show')->name('tags.show');
        Route::get('/', 'PostController@index')->name('news.index');
        Route::get('/{slug}', 'PostController@show')->name('news.show');
    });

    Route::get('search/{type?}', 'SearchController@count')->name('search.count');
});

Route::group([
    'namespace' => 'User',
    'middleware' => ['throttle:60,1', PreferredLanguage::class],
    'as' => config('site.user.routes.prefix.name') . 'user.',
    'prefix' => config('site.user.routes.prefix.path'),
], function () {
    Route::get('equipment/{slug}', 'LandingController@index')->name('landing');

    Route::group([
        'namespace' => 'Catalog',
        'prefix' => 'catalog',
    ], function () {
        Route::get('category/{slug}/{type?}', 'TagController@show')->name('tags.show');
        Route::get('manufacturer/{slug}/{type?}', 'ManufacturerController@show')->name('manufacturer.show');
        Route::get('/equipment/{slug}', 'MachineController@show')->name('catalog.show');
        Route::get('/{type?}', 'MachineController@index')->name('catalog.index');
        Route::post('order/{slug}', 'OrderController@order')->middleware([RecaptchaMiddleware::class, 'throttle:10,1'])->name('order');
    });

    Route::group([
        'namespace' => 'Blog',
        'prefix' => 'blog',
        'as' => 'blog.',
    ], function () {
        Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
        Route::get('tags/{slug}', 'TagController@show')->name('tags.show');
        Route::get('/', 'PostController@index')->name('news.index');
        Route::get('/{slug}', 'PostController@show')->name('news.show');
    });

    Route::group([
        'namespace' => 'Exhibitions',
        'prefix' => 'exhibitions',
        'as' => 'exhibitions.',
    ], function () {
        Route::get('categories/{slug}', 'CategoryController@show')->name('categories.show');
        Route::get('tags/{slug}', 'TagController@show')->name('tags.show');
        Route::get('/', 'PostController@index')->name('news.index');
        Route::get('/{slug}', 'PostController@show')->name('news.show');
    });

    Route::get('search/{type?}', 'SearchController@count')->name('search.count');
});

Route::group([
    'prefix' => 'admsfsdfsin',
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth', 'throttle:60,1']
], function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::group([
        'middleware' => ['can:manage'],
    ], function () {
        Route::get('manage-orders/{active?}', 'ManageOrdersController@index')->name('manage.orders.index');
        Route::delete('manage-orders/{order}', 'ManageOrdersController@destroy')->name('manage.orders.destroy');
        Route::put('manage-orders/{order}', 'ManageOrdersController@viewed')->name('manage.orders.viewed')->middleware(IsAjax::class);
        Route::get('corrections/{active?}', 'CorrectionsController@index')->name('corrections.index');
        Route::post('corrections-create', 'CorrectionsController@create')->name('corrections.create')->middleware(IsAjax::class);
        Route::get('corrections/{correction}/edit', 'CorrectionsController@edit')->name('corrections.edit');
        Route::delete('corrections/{correction}', 'CorrectionsController@destroy')->name('corrections.destroy');
    });

    Route::group([
        'middleware' => ['can:admin'],
    ], function () {
        Route::group([
            'namespace' => 'Catalog',
            'prefix' => 'catalog',
        ], function () {
            Route::resource('tag', 'TagController')->except('show');
            Route::resource('properties', 'PropertyController')->except('show');
            Route::resource('machines', 'MachineController');
            Route::resource('manufacturer', 'ManufacturerController')->except('show');

            Route::post('blog-images', 'ImagesController@upload')->name('images.upload')->middleware(IsAjax::class);
            Route::post('blog-images-delete', 'ImagesController@destroy')->name('images.delete')->middleware(IsAjax::class);
        });

        Route::group([
            'namespace' => 'Blog',
            'as' => 'blog.',
            'prefix' => 'blog',
        ], function () {
            Route::get('posts/index/{type?}', 'PostsController@index')->name('posts.index');
            Route::resource('posts', 'PostsController')->except('index');
            Route::resource('categories', 'CategoriesController')->except('show');
            Route::resource('tags', 'TagsController')->except('show');

            Route::post('post-images', 'ImagesController@upload')->name('images.upload')->middleware(IsAjax::class);
            Route::post('post-images-delete', 'ImagesController@destroy')->name('images.delete')->middleware(IsAjax::class);
        });

        Route::group([
            'namespace' => 'Common',
            'as' => 'common.',
            'prefix' => 'common',
        ], function () {
            Route::resource('galleries', 'GalleriesController');
            Route::patch('gallery-photos-up', 'GalleryPhotosController@photoUp')->name('photo.up')->middleware([IsAjax::class, ImageExists::class]);
            Route::patch('gallery-photos-down', 'GalleryPhotosController@photoDown')->name('photo.down')->middleware([IsAjax::class, ImageExists::class]);
            Route::delete('gallery-photos-remove', 'GalleryPhotosController@removePhoto')->name('photo.remove')->middleware([IsAjax::class, ImageExists::class]);
        });
    });
});


