<?php

namespace App\Http\Controllers;

use App\Entities\Blog\Post;
use App\Entities\Catalog\Tag;

class MainController extends Controller
{
    public function index()
    {
        $categories = Tag::query()->with('machines')->where('main', true)->orderByDesc('id')->get();
        $post = Post::query()->onlyPosts()->with('category')->orderByDesc('id')->limit(1)->first();
        $exhibitions = Post::query()->onlyExhibitions()->with('category')->orderByDesc('id')->limit(2)->get();
        return $this->getView('main', compact('categories', 'post', 'exhibitions'));
    }
}
