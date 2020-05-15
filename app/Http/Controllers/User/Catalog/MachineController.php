<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Machine;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function index()
    {
        $machines = Machine::query()->with('tags')->isNew()->orderBy('id')->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.machines.index', compact('machines'));
    }

    public function show($slug)
    {
        $machine = Machine::findBySlugOrFail($slug);
        if ($machine->is_redirect) {
            $prefix = $this->getLang() === 'ru' ? 'ru.' : '';
            return redirect()->route($prefix . 'user.landing', ['slug' => $slug]);
        }
        $categories = $machine->tags()->get();
        $properties = $machine->properties()->get();
        $gallery = $machine->gallery()->first();
        $manufacturer = $machine->manufacturer()->first();
        return $this->getView('user.catalog.machines.show', compact('machine', 'categories', 'properties', 'gallery', 'manufacturer'));
    }
}
