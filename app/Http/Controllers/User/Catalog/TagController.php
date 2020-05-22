<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show(string $slug, string $type = '')
    {
        $tag = Tag::findBySlugOrFail($slug);
        $machines = $tag->machines()->getMachines($type)->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.tags.show', compact('tag', 'machines'));
    }
}
