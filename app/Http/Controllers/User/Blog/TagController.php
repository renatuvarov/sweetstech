<?php

namespace App\Http\Controllers\User\Blog;

use App\Entities\Blog\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function show(string $slug)
    {
        $tag = Tag::query()->with('posts')->where('slug', $slug)->first();
        return $this->getView('user.blog.tags.show', compact('tag'));
    }
}
