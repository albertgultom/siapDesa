<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('landing');
    }

    public function  struktur()
    {
        return view('monografi.struktur');
    }

    public function  sejarah()
    {
        return view('monografi.sejarah');
    }
}
