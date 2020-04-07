<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\User\ContactMail;
use Illuminate\Contracts\Mail\Mailer;

class ContactController extends Controller
{
    public function index(ContactRequest $request, Mailer $mailer)
    {
        $mailer->to(env('ADMIN_EMAIL'))->send(new ContactMail($request->all()));
        return ['success' => 1];
    }
}
