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
            $view->with(['categories' => Tag::all()]);
        });
    }
}
