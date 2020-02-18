<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Entities\Catalog\Machine;
use App\Entities\Catalog\Property;
use App\Entities\Catalog\Tag;
use App\Entities\Catalog\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Machines\CreateRequest;
use App\Http\Requests\Admin\Catalog\Machines\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::with('type')->paginate(5);
        return view('admin.machines.index', compact('machines'));
    }

    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();
        $properties = Property::all();
        return view('admin.machines.create', compact('types', 'tags', 'properties'));
    }

    public function store(CreateRequest $request)
    {
        /** @var Machine $machine */
        $machine = Machine::make([
            'name_en' => mb_strtolower($request->input('name_en')),
            'name_ru' => mb_strtolower($request->input('name_ru')),
            'description_en' => $request->input('description_en'),
            'description_ru' => $request->input('description_ru'),
            'slug' => mb_strtolower($request->input('slug')) ?: Str::slug(mb_strtolower($request->input('name_en'))),
            'img' => '/storage/' . $request->file('img')->store('machines'),
        ]);

        $machine->type()->associate(Type::findOrFail($request->input('type')));

        $machine->save();

        $machine->tags()->attach(Tag::whereIn('id', $request->input('tags'))->pluck('id'));

        $propsArray = [];
        foreach ($request->input('properties') as $item) {
            $propsArray[$item['name']] = ['value' => $item['value']];
        }
        $machine->properties()->attach($propsArray);

        return redirect()->route('admin.machines.show', ['machine' => $machine->id]);
    }

    public function show($id)
    {
        $machine = Machine::getByIdWithPivots($id);
        return view('admin.machines.show', compact('machine'));
    }

    public function edit($id)
    {
        $machine = Machine::getByIdWithPivots($id);
        $types = Type::all();
        $tags = Tag::all();
        $properties = Property::all();
        return view('admin.machines.edit', compact('machine', 'tags', 'types', 'properties'));
    }

    public function update(UpdateRequest $request, $id)
    {
        $machine = Machine::getByIdWithPivots($id);
    }

    public function destroy(Machine $machine)
    {
        Storage::delete(str_replace('/storage', '', $machine->img));
        $machine->delete();
        return redirect()->route('admin.machines.index');
    }
}
