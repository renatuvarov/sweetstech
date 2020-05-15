<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Manufacturer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function show(string $slug)
    {
        $manufacturer = Manufacturer::findBySlugOrFail($slug);
        $machines = $manufacturer->machines()->isNew()->paginate(config('site.user.pagination'));
        return $this->getView('user.catalog.manufacturers.show', compact('manufacturer', 'machines'));
    }
}
