<?php

namespace App\Http\Controllers;

use App\Entities\Catalog\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $order = Order::find(4)->created_at;
//        dd($order->diffInMinutes(Carbon::now()));
        dd($order->diffInMinutes(Carbon::now()) < config('site.user.order.interval'));
        return view('main');
    }
}
