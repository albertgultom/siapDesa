<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PopulationController extends Controller
{
    public function index()
    {
        return view('populations.index');
    }

    public function show()
    {
        //
    }
}
