<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Entities\Catalog\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Types\CreateRequest;
use App\Http\Requests\Admin\Catalog\Types\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::paginate(5);
        return view('admin.types.index', compact('types'));
    }

    public function create()
    {
        return view('admin.types.create');
    }

    public function store(CreateRequest $request)
    {
        Type::create([
            'name_en' => mb_strtolower($request->input('name_en')),
            'name_ru' => mb_strtolower($request->input('name_ru')),
            'slug' => $request->input('slug') ?: Str::slug($request->input('name_en')),
            'img' => '/storage/' . $request->file('img')->store('types'),
        ]);

        return redirect()->route('admin.types.index');
    }

    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    public function update(UpdateRequest $request, Type $type)
    {
        if ($request->hasFile('img')) {
            Storage::delete(str_replace('/storage', '', $type->img));
            $path = '/storage/' . $request->file('img')->store('types');
        }

        $type->update([
            'name_en' => mb_strtolower($request->input('name_en')) ?: $type->name_en,
            'name_ru' => mb_strtolower($request->input('name_ru')) ?: $type->name_ru,
            'slug' => $request->input('slug') ? Str::slug($request->input('slug')) : $type->slug,
            'img' => $path ?? $type->img,
        ]);

        return redirect()->route('admin.types.index');
    }

    public function destroy(Type $type)
    {
        Storage::delete(str_replace('/storage', '', $type->img));
        $type->delete();
        return redirect()->route('admin.types.index');
    }
}
