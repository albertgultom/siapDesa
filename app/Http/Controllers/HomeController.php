<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Post;
use App\Apparatus;

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
        $data = Apparatus::orderBy('number', 'asc')->where('active', '=', 1)->get();
        return view('landing', compact('row','data'));
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

    public function artikel(Request $request)
    {
        // dd($request->tag);
        $row = Profile::find(1);
        $tags = \App\Tag::all();
        $posts = Post::where('active', '=', 1)
            // ->has('tagable.name', '=',$request->tag)
            ->orderBy('updated_at','desc')
            ->paginate(20)
            ;
        
        // dd($posts);
        return view('berita.artikel', compact('row', 'tags', 'posts'));
    }

    public function lihat_artikel($id)
    {
        $row = Profile::find(1);
        $post = Post::findOrFail($id);
        // dd($post->type_id);
        $berita = Post::where('type_id','=',$post->type_id)
                ->whereNotIn('id',[$post->id])
                ->orderBy('updated_at','desc')
                ->limit(4)->get();
        // dd($berita);

        // $posts = Post::find($id);
        // dd($post);
        return view('berita.lihat',compact('row','post','berita'));
    }
    
}
