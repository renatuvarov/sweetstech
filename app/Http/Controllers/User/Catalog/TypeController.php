<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('user.catalog.types.index', compact('types'));
    }

    public function show($slug)
    {
        $type = Type::where('slug', $slug)->first();
        $machines = $type->machines()->paginate(config('site.user.pagination'));
        return view('user.catalog.types.show', compact('type', 'machines'));
    }
}
