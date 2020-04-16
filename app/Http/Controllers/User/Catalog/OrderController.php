<?php

namespace App\Http\Controllers\User\Catalog;

use App\Entities\Catalog\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Catalog\OrderRequest;
use App\Mail\User\Catalog\Order\AdminMail;
use App\Mail\User\Catalog\Order\ClientMail;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Mail\Mailer;
use PHPMailer\PHPMailer\PHPMailer;

class OrderController extends Controller
{
    public function order(OrderRequest $request, \Illuminate\Contracts\Mail\Mailer $mailer)
    {
        if (Order::isAlreadyOrdered($request->all())) {
            return ['isAlreadyOrdered' => true];
        }

        $order = Order::createOrder($request->all());
        $machine = $order->machine;
        $isEn = $this->getLang() === 'en';
//        $mailer->to($order->customer_email)->send(new ClientMail($machine, $order->customer_name, $isEn ? 'en' : 'ru'));
//        $mailer->to(env('ADMIN_EMAIL'))->send(new AdminMail($order, $machine));
        return ['success' => $order->customer_name];
    }
}
