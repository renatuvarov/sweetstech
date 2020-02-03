<?php

namespace App\Http\Controllers\User;

use App\Handlers\ValidateOrderEmail;
use App\Http\Controllers\Controller;
use App\Mail\OrderMail;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function mmc200()
    {
        return view('landings.mmc-200');
    }

    public function mmc200form(Request $request, ValidateOrderEmail $orderEmail, Mailer $mailer)
    {
        $validator = $orderEmail->handle($request);

        if ($validator->fails()) {
            return response()->json(['errs' => $validator->getMessageBag()->toArray()]);
        }

        $mailer->to(env('ADMIN_EMAIL'))->send(new OrderMail($request->except('_token')));

        return response()->json([
            'resp' => 'success',
            'txt' => $request->input('name') . ', заказ на ' . $request->input('product') . ' принят, мы свяжемся с вами в ближайшее время.',
        ]);
    }
}
