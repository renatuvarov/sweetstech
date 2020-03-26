<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->first();
        $machines = $tag->machines()->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.tags.show', compact('tag', 'machines'));
    }
}
