<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\Profile;
use App\Post;
use App\Apparatus;

class HomeController extends Controller
{
    private $row;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        $this->row = Profile::find(1);
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
        $tagName = Input::get('tag', false);
        $row = Profile::find(1);
        $tags = \App\Tag::all();
        $posts = Post::orderBy('updated_at', 'desc');
        if($tagName){
            $posts = Post::orderBy('updated_at', 'asc')
            ->where('active', '=', 1)
            ->whereHas('tags', function($q) use ($tagName){
                return $q->where('name', '=', $tagName);
            })->paginate(9);
        }else{
            $posts = Post::orderBy('updated_at', 'asc')
            ->where('active', '=', 1)
            ->paginate(9);
        }
        // dd($posts);
        return view('berita.artikel', compact('row', 'tags', 'posts'));
    }

    public function lihat_artikel($name)
    {
        $row = Profile::find(1);
        $post = Post::where('name', '=', $name)->first();
        // dd($post->type_id);
        $berita = Post::where('type_id','=',$post->type_id)
                ->whereNotIn('id',[$post->id])
                ->where('active', 1)
                ->orderBy('updated_at','desc')
                ->limit(4)->get();
        // dd($berita);

        // $posts = Post::find($id);
        // dd($post);
        return view('berita.lihat',compact('row','post','berita'));
    }

    public function pelayanan()
    {
        return view('layouts.pelayanan', ['row' => $this->row]);
    }

    public function galeri($content, $file=null)
    {
        //
    }
    
}
