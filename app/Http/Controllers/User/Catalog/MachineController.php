<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Machine;
use App\Http\Controllers\Controller;

class MachineController extends Controller
{
    public function index(string $type = '')
    {
        $machines = Machine::query()->with('tags')->getMachines($type)->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.machines.index', compact('machines'));
    }

    public function show(string $slug)
    {
        $machine = Machine::findBySlugOrFail($slug);

        if ($machine->is_redirect) {
            $prefix = $this->getLang() === 'ru' ? 'ru.' : '';
            return redirect()->route($prefix . 'user.landing', ['slug' => $slug]);
        }

        return $this->getView('user.catalog.machines.show', [
            'machine' => $machine,
            'categories' => $machine->tags()->get(),
            'properties' => $machine->properties()->get(),
            'gallery' => $machine->gallery()->first(),
            'manufacturer' => $machine->manufacturer()->first(),
        ]);
    }
}
