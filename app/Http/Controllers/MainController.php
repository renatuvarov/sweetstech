<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function index()
    {
        dd(public_path());
        return view('main');
    }
}
