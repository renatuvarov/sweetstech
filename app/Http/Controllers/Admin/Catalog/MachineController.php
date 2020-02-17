<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Entities\Catalog\Machine;
use App\Entities\Catalog\Property;
use App\Entities\Catalog\Tag;
use App\Entities\Catalog\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalog\Machines\CreateRequest;
use Illuminate\Http\Request;

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
        dd(array_values(array_count_values(array_column($request->all()['properties'], 'name')))[0] > 0);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
