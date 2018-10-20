<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Type;
use App\Tag;
use Carbon\Carbon;

class PostController extends Controller
{
    private $allowedImage = [
        'image/jpeg',
        'image/png',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('posts.index');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
            // ->with(['tags' => function($q){
            //     $q->select('name');
            // }])
            // ->first();
        
        $tags = $post->tags->map(function($tag){
            return [
                'name' => $tag->name
            ];
        });

        $query = [
            'id' => $post->id,
            'name' => $post->name,
            'body' => $post->body,
            'type' => $post->type->name,
            'user' => $post->user->name,
            'tags' => $tags
        ];

        // dd($query);
        // return $post->tags;
        return response()->json($query);
    }

    public function create()
    {
        $types = Type::all();
        $tags = Tag::select('id', 'name')->get();
        
        return view('posts.create', compact('types', 'tags'));
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'type_id' => 'required',
            'name' => 'required|max:191',
            'image' => 'required',
            'body' => 'required',
        ]);
        // test user
        $data['user_id'] = Auth::id();
        $data['created_at'] = Carbon::now(); 
        $data['updated_at'] = Carbon::now();       

        if($request->active == null){
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
        }

        if($request->hasFile('image')){
            $extension = $request->image->getMimeType();
            if (! in_array($extension, $this->allowedImage)) {
                return back()->withInput()->withErrors(array('image' => 'Tipe file tidak di dukung.'));
            }else{
                $date = date('ymdhis_');
                $file = $request->image->getClientOriginalName();
                $filename = $date . str_replace(' ', '_', strtolower($file));
                $store = $request->image->storeAs('public/images', $filename);
                $data['image'] = $filename;
            }
        }

        $post = Post::insertGetId($data);
        if(!$post){
            return back()->with('alert-danger', 'Artikel tidak dapat di simpan.');
        }

        $count = count($request->tags);
        if($count > 0){
            $postId = Post::find($post);
            $postId->tags()->attach($request->tags);
        }
        // dd($request->tags);
        return redirect()->route('post.index')->with('alert-info', 'Artikel telah di simpan.');
    }

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        $types = Type::all();
        $tags = Tag::select('id', 'name')->get();
        
        // dd($data->tags);
        return view('posts.edit', compact('data', 'types', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $data = $this->validate($request, [
            'type_id' => 'required',
            'name' => 'required|max:191',
            'image' => '',
            'body' => 'required',
        ]);

        $data['user_id'] = Auth::id();
        $data['updated_at'] = Carbon::now();

        if($request->active == null){
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
        }

        if($request->hasFile('image')){
            $extension = $request->image->getMimeType();
            if (! in_array($extension, $this->allowedImage)) {
                return back()->withInput()->withErrors(array('image' => 'Tipe file tidak di dukung.'));
            }else{
                $date = date('ymdhis_');
                $file = $request->image->getClientOriginalName();
                $filename = $date . str_replace(' ', '_', strtolower($file));
                $store = $request->image->storeAs('public/images', $filename);
                $data['image'] = $filename;
            }
        }

        if(!$post->tags()->sync($request->tags)){
            return back()->with('alert-danger', 'Data kategori tidak dapat di update.');
        }

        if(!$post->update($data)){
            return back()->with('alert-danger', 'Artikel tidak dapat di update.');
        }

        return redirect()->route('post.index')->with('alert-info', 'Artikel telah di update.');
    }

    public function list()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        $data = $posts->map(function($item){
            if($item->active !== 0){
                $active = 'checked';
            }else{
                $active = '';
            }
            return [
                'id' => $item->id,
                'type' => $item->type->name,
                'name' => $item->name,
                'active' => $active,
                'created' => $item->updated_at->format('d-m-Y')
            ];
        });
        return response()->json($data);
    }
}
