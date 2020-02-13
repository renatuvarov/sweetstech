<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Catalog\Property;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Properties\CreateRequest;
use App\Http\Requests\Admin\Properties\UpdateRequest;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::paginate(5);
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(CreateRequest $request)
    {
        Property::create([
            'name_en' => mb_strtolower($request->input('name_en')),
            'name_ru' => mb_strtolower($request->input('name_ru')),
            'measure_en' => mb_strtolower($request->input('measure_en')) ?: null,
            'measure_ru' => mb_strtolower($request->input('measure_ru')) ?: null,
        ]);

        return redirect()->route('admin.properties.index');
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function update(UpdateRequest $request, Property $property)
    {
        $property->update([
            'name_en' => mb_strtolower($request->input('name_en')) ?: $property->name_en,
            'name_ru' => mb_strtolower($request->input('name_ru')) ?: $property->name_ru,
            'measure_en' => mb_strtolower($request->input('measure_en')) ?: null,
            'measure_ru' => mb_strtolower($request->input('measure_ru')) ?: null,
        ]);

        return redirect()->route('admin.properties.index');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index');
    }
}
