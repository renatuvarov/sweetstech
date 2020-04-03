<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Machine;
use App\Entities\Catalog\Tag;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function index()
    {
        $categories = Tag::query()->with('machines')->get()->filter(function ($category) {
            return $category->machines->count() > 0;
        });
        $machines = Machine::query()->with('tags')->orderBy('id')->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.machines.index', compact('machines', 'categories'));
    }

    public function show($slug)
    {
        $machine = Machine::findBySlugOrFail($slug);
        $machine->load('tags', 'properties');
        return $this->getView('user.catalog.machines.show', compact('machine'));
    }
}
