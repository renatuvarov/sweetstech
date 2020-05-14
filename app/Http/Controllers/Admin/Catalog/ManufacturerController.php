<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Entities\Catalog\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Manufacturer\CreateRequest;
use App\Http\Requests\Admin\Catalog\Manufacturer\UpdateRequest;
use Illuminate\Support\Str;

class ManufacturerController extends Controller
{
    public function index()
    {
        $manufacturers = Manufacturer::query()->paginate(10);
        return view('admin.manufacturers.index', compact('manufacturers'));
    }

    public function create()
    {
        return view('admin.manufacturers.create');
    }

    public function store(CreateRequest $request)
    {
        Manufacturer::query()->create([
            'name_en' => $request->input('name_en'),
            'name_ru' => $request->input('name_ru'),
            'slug' => Str::slug($request->input('slug')) ?: Str::slug($request->input('name_en')),
        ]);

        return redirect()->route('admin.manufacturer.index');
    }

    public function edit(Manufacturer $manufacturer)
    {
        return view('admin.manufacturers.edit', compact('manufacturer'));
    }

    public function update(UpdateRequest $request, Manufacturer $manufacturer)
    {
        $manufacturer->update([
            'name_en' => $request->input('name_en'),
            'name_ru' => $request->input('name_ru'),
            'slug' => Str::slug($request->input('slug')) ?: Str::slug($request->input('name_en')),
        ]);

        return redirect()->route('admin.manufacturer.index');
    }

    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();
        return redirect()->route('admin.manufacturer.index');
    }
}
