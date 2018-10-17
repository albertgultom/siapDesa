<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Post;
use App\Apparatus;
use App\Gallery;

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
        $tags = \App\Tag::all();
        $foto = Gallery::where('active', '=', 1)
        // ->where('#')
            ->orderBy('updated_at','asc')
            ->paginate(20)
            ;
        // dd($foto);
        return view('berita.foto',compact('row','tags', 'foto'));
    }

    public function artikel(Request $request)
    {
        // dd($request->tag);
        // $tag = 'Perkebunan';
        $row = Profile::find(1);
        $tags = \App\Tag::all();
        $posts = Post::where('active', '=', 1)
            // ->whereHas('tags.id', '=', 1)
            ->orderBy('updated_at','desc')
            ->paginate(9)
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

    public function galeri_foto(Request $request)
    {
        $row = Profile::find(1);
        
    }
    
    public function lihat_foto(Request $request, $id)
    {
        $row = Profile::find(1);
        $query = Gallery::findOrFail($id);
        $contents = $query
            ->contents()
            ->select(['name','image'])
            ->get();
        $data = collect([
            'name' => $query->name,
            'date' => $query->updated_at->format('d-m-Y'),
            'type' => $query->type->name,
            'tags' => $query->tags->pluck('name'),
            'contents' => $contents,
        
        ]);
        return view('berita.lihat_foto',compact ('row','query','data'));
        // return response()->json($data);
    }
    
}
