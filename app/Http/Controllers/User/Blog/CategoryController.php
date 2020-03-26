<?php

namespace App\Http\Controllers\User\Blog;

use App\Entities\Blog\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::query()->with('posts')->where('slug', $slug)->first();
        return $this->getView('user.blog.categories.show', compact('category'));
    }
}
