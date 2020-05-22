<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Entities\Catalog\Machine;
use App\Entities\Catalog\Manufacturer;
use App\Entities\Catalog\Property;
use App\Entities\Catalog\Tag;
use App\Handlers\ImageManager;
use App\Handlers\TransactionManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Machines\CreateRequest;
use App\Http\Requests\Admin\Catalog\Machines\UpdateRequest;
use App\UseCases\Catalog\CreateMachine;
use App\UseCases\Catalog\UpdateMachine;
use App\Entities\Common\Gallery;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::paginate(5);
        return view('admin.machines.index', compact('machines'));
    }

    public function create()
    {
        $tags = Tag::all();
        $properties = Property::all();
        $galleries = Gallery::all();
        $manufacturers = Manufacturer::all();
        $types = Machine::getTypes();
        return view('admin.machines.create', compact('tags', 'properties', 'galleries', 'manufacturers', 'types'));
    }

    public function store(CreateRequest $request, CreateMachine $createMachine, TransactionManager $transactionManager)
    {
        $transactionManager->handle(function () use ($request, $createMachine) {
            $createMachine->action($request->all());
        });

        return redirect()->route('admin.machines.index');
    }

    public function show($id)
    {
        $machine = Machine::getByIdWithPivots($id);
        return view('admin.machines.show', compact('machine'));
    }

    public function edit($id)
    {
        $machine = Machine::getByIdWithPivots($id);
        $tags = Tag::all();
        $properties = Property::all();
        $galleries = Gallery::all();
        $manufacturers = Manufacturer::all();
        $types = Machine::getTypes();
        return view('admin.machines.edit', compact('machine', 'tags', 'properties', 'galleries', 'manufacturers', 'types'));
    }

    public function update(UpdateRequest $request, $id, UpdateMachine $updateMachine, TransactionManager $transactionManager)
    {
        $machine = Machine::getByIdWithPivots($id);

        $transactionManager->handle(function () use ($request, $updateMachine, $machine) {
            $updateMachine->action($machine, $request->all());
        });

        return redirect()->route('user.catalog.show', [
            'slug' => $machine->slug,
        ]);
    }

    public function destroy(Machine $machine, ImageManager $manager)
    {
        $manager->delete([$machine->img]);
        $manager->delete($machine->images);
        $machine->delete();
        return redirect()->route('admin.machines.index');
    }
}
