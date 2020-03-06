<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getLang()
    {
        $prefix = config('site.user.routes.prefix.name');
        return $prefix === substr(request()->route()->getName(), 0, strlen($prefix)) ? 'ru' : 'en';
    }

    protected function getView($view, ?array $data = [])
    {
        $prefix = $this->getLang() === 'ru' ? config('site.user.routes.prefix.name') . '.' : '';
        return view($prefix . $view, $data);
    }
}
