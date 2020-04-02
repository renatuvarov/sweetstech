<?php

namespace App\Http\Controllers\User\Exhibitions;

use App\Entities\Blog\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        $category = Category::findBySlugOrFail($slug);
        $posts = $category->onlyExhibitions()->paginate(config('site.user.pagination'));
        return $this->getView('user.exhibitions.categories.show', compact('category', 'posts'));
    }
}
