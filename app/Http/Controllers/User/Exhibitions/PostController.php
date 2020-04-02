<?php

namespace App\Http\Controllers\User\Exhibitions;

use App\Entities\Blog\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->onlyExhibitions()->with('category')->paginate(config('site.user.pagination'));
        return $this->getView('user.exhibitions.posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::findBySlugOrFail($slug);
        $post->load('tags', 'category');
        return $this->getView('user.exhibitions.posts.show', compact('post'));
    }
}
