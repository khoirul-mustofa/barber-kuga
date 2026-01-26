<?php

namespace App\Http\Controllers;

class BookingController extends Controller
{
    public function index()
    {
        return view('kuga.booking');
    }

    public function store() {}
}
