<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;

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
        $row = Profile::find(1);
        return view('landing', compact('row'));
    }

    public function  struktur()
    {
        $row = Profile::find(1);
        return view('monografi.struktur',compact('row'));
    }

    public function  sejarah()
    {
        $row = Profile::find(1);
        return view('monografi.sejarah',compact('row'));
    }

    public function  potensi()
    {
        $row = Profile::find(1);
        return view('monografi.potensi',compact('row'));
    }
    public function  foto()
    {
        $row = Profile::find(1);
        return view('berita.foto',compact('row'));
    }
}
