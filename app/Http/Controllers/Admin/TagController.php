<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Catalog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\CreateRequest;
use App\Http\Requests\Admin\Tags\UpdateRequest;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('admin.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(CreateRequest $request)
    {
        Tag::create([
            'name_en' => mb_strtolower($request->input('name_en')),
            'name_ru' => mb_strtolower($request->input('name_ru')),
            'slug' => $request->input('slug') ?: Str::slug($request->input('name_en')),
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        $tag->update([
            'name_en' => mb_strtolower($request->input('name_en')) ?: $tag->name_en,
            'name_ru' => mb_strtolower($request->input('name_ru')) ?: $tag->name_ru,
            'slug' => $request->input('slug') ? Str::slug($request->input('slug')) : $tag->slug,
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.tag.index');
    }
}
