<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OccupationController extends Controller
{
    public function index()
    {
        return view('occupations.index');
    }
}
