<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Catalog\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManageOrdersController extends Controller
{
    public function index(?string $active = null)
    {
        $ordersCount = DB::table('orders')->count();
        $activeOrdersCount = DB::table('orders')->where('viewed', false)->count();

        $orders = Order::query()->with('machine');

        if ( ! empty($active)) {
            $orders->where('viewed', false);
        }

        $orders = $orders->orderByDesc('id')->paginate(config('site.user.pagination'));
        return view('admin.orders.index', compact('orders', 'ordersCount', 'activeOrdersCount'));
    }

    public function viewed(Order $order)
    {
        if ($order->viewed) {
            throw new HttpResponseException(response()->json(['user' => $order->user->email], 422));
        }

        $user = Auth::user();
        $order->makeViewed($user);

        return ['user' => $user->email];
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.manage.orders.index');
    }
}
