<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Machine;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function index()
    {

    }

    public function show($slug)
    {
//        $machine = Machine::where('slug', $slug)->with('type', 'tags', 'properties')->first();
        $machine = Machine::where('slug', $slug)->with('tags', 'properties')->first();
        return $this->getView('user.catalog.machines.show', compact('machine'));
    }
}
