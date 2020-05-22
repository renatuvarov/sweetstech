<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Manufacturer;
use App\Http\Controllers\Controller;

class ManufacturerController extends Controller
{
    public function show(string $slug, string $type = '')
    {
        $manufacturer = Manufacturer::findBySlugOrFail($slug);
        $machines = $manufacturer->machines()->getMachines($type)->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.manufacturers.show', compact('manufacturer', 'machines'));
    }
}
