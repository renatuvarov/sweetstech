<?php

namespace App\Http\Controllers;

use App\Entities\Catalog\Tag;

class MainController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('main', compact('tags'));
    }
}
