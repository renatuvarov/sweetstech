<?php

namespace App\Http\Controllers\User\Blog;

use App\Entities\Blog\Post;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->with('category')->paginate('2');
        return $this->getView('user.blog.posts.index', compact('posts'));
    }

    public function show(string $slug)
    {
        $post = Post::query()->with('category', 'tags')->where('slug', $slug)->first();
        return $this->getView('user.blog.posts.show', compact('post'));
    }
}
