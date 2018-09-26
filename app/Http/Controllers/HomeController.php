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

    public function artikel()
    {
        $row = \App\Profile::find(1);
        $tags = \App\Tag::all();
        $posts = \App\Post::where('active', '=', 1)
            ->orderBy('updated_at','desc')
            ->paginate(6);
        // dd($posts);
        return view('berita.artikel', compact('row', 'tags', 'posts'));
    }
}
