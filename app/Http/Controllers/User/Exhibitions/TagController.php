<?php

namespace App\Http\Controllers\User\Blog;

use App\Entities\Blog\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show(string $slug)
    {
        $tag = Tag::findBySlugOrFail($slug);
        $posts = $tag->onlyExhibitions()->paginate(config('site.user.pagination'));
        return $this->getView('user.exhibitions.tags.show', compact('tag', 'posts'));
    }
}
