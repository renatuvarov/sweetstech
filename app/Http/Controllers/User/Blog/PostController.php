<?php

namespace App\Http\Controllers\User\Blog;

use App\Entities\Blog\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->onlyPosts()->with('category')->paginate(config('site.user.pagination'));
        return $this->getView('user.blog.posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::findBySlugOrFail($slug);
        $post->load('tags', 'category');
        return $this->getView('user.blog.posts.show', compact('post'));
    }
}
