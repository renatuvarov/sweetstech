<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Machine;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::query()->with('tags')->orderBy('id')->paginate(2);
        return $this->getView('user.catalog.machines.index', compact('machines'));
    }

    public function show($slug)
    {
        $machine = Machine::query()->where('slug', $slug)->with('tags', 'properties')->first();
        return $this->getView('user.catalog.machines.show', compact('machine'));
    }
}
