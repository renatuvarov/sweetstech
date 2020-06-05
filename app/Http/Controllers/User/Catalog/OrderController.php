<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Order;
use App\Events\Order\Accepted;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Catalog\OrderRequest;
use Illuminate\Contracts\Events\Dispatcher;

class OrderController extends Controller
{
    public function order(OrderRequest $request, Dispatcher $dispatcher)
    {
        if ( ! Order::isAlreadyOrdered($request->all())) {
            $order = Order::createOrder($request->all())->load('machine');
            $dispatcher->dispatch(new Accepted($order));
        }

        return $this->getView('user.catalog.order.thanks');
    }
}
