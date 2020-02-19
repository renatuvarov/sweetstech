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
        return redirect()->route('admin.machines.show', [
            'machine' => Machine::new($request->all())->id,
        ]);
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
        return redirect()->route('admin.machines.show', [
            'machine' => $machine->updateMachine($request->all())->id,
        ]);
    }

    public function destroy(Machine $machine)
    {
        Storage::delete(str_replace('/storage', '', $machine->img));
        $machine->delete();
        return redirect()->route('admin.machines.index');
    }
}
