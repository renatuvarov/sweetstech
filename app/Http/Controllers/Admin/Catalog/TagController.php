<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Entities\Catalog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Tags\CreateRequest;
use App\Http\Requests\Admin\Catalog\Tags\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Psr\SimpleCache\CacheInterface;

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
            'main' => (bool) $request->input('main'),
            'img' => '/storage/' . $request->file('img')->store('tags'),
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(UpdateRequest $request, Tag $tag)
    {
        if ($request->hasFile('img')) {
            Storage::delete(str_replace('/storage', '', $tag->img));
            $path = '/storage/' . $request->file('img')->store('types');
        }

        $tag->update([
            'name_en' => mb_strtolower($request->input('name_en')) ?: $tag->name_en,
            'name_ru' => mb_strtolower($request->input('name_ru')) ?: $tag->name_ru,
            'slug' => $request->input('slug') ? Str::slug($request->input('slug')) : $tag->slug,
            'main' => (bool) $request->input('main'),
            'img' => $path ?? $tag->img,
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function destroy(Tag $tag, CacheInterface $cache)
    {
        Storage::delete(str_replace('/storage', '', $tag->img));
        $tag->delete();
        $cache->forget('categories');
        return redirect()->route('admin.tag.index');
    }
}
