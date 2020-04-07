<?php

namespace App\Providers;

use App\Entities\Catalog\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class ComposerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer(['parts.machines-categories', 'ru.parts.machines-categories', 'parts.search', 'ru.parts.search'], function(View $view) {
            $categories = Cache::rememberForever('categories', function() {
                $categories = DB::table('machine_tag')->select('tag_id')->distinct()->pluck('tag_id');
                return Tag::find($categories)->toArray();
            });

            $view->with(compact('categories'));
        });
    }
}
