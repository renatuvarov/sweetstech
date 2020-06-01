<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Order;
use App\Events\Order\Accepted;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Catalog\OrderRequest;
use App\Mail\User\Catalog\Order\AdminMail;
use App\Mail\User\Catalog\Order\ClientMail;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\Mail\Mailer;

class OrderController extends Controller
{
    public function order(OrderRequest $request, Mailer $mailer, Dispatcher $dispatcher)
    {
        if ( ! Order::isAlreadyOrdered($request->all())) {
            $order = Order::createOrder($request->all());
            $machine = $order->machine;
            $isEn = $this->getLang() === 'en';
//        $mailer->to($order->customer_email)->send(new ClientMail($machine, $order->customer_name, $isEn ? 'en' : 'ru'));
//        $mailer->to(env('ADMIN_EMAIL'))->send(new AdminMail($order, $machine));
            $dispatcher->dispatch(new Accepted($order));
        }

        return $this->getView('user.catalog.order.thanks');
    }
}
