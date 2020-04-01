<?php

namespace App\Providers;

use App\Entities\Catalog\Tag;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['parts.machines-categories', 'ru.parts.machines-categories'], function(View $view) {
            $categories = Tag::query()->with('machines')->get()->filter(function ($category) {
                return $category->machines->count() > 0;
            });

            $view->with(compact('categories'));
        });
    }
}
