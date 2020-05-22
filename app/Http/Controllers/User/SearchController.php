<?php

namespace App\Http\Controllers\User;

use App\Entities\Catalog\Machine;
use App\Entities\Catalog\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Search\CountRequest;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function count(CountRequest $request, string $type = '')
    {
        $query = Machine::query();
        if (! empty($request->input('st_categories'))) {
            $query->whereIn('id', DB::table('machine_tag')
                ->whereIn('tag_id', $request->input('st_categories'))
                ->pluck('machine_id')
                ->toArray()
            );
        }

        if (! empty($request->input('st_title'))) {
            $query->where('name_en', 'like', '%' . $request->input('st_title') . '%')
                ->orWhere('name_ru', 'like', '%' . $request->input('st_title') . '%');
        }

        $machines = $query->getMachines($type)->paginate(config('site.user.pagination'));
        return $this->getView('user.search.search', compact('machines'));
    }
}
