<?php

namespace App\Http\Controllers;

use App\Models\Galery;

class HomeController extends Controller
{
    public function index()
    {
        $galeris = Galery::all();

        return view('kuga.index', compact('galeris'));
    }
}
