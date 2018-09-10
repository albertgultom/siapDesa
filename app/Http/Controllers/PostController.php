<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Post;
use App\Type;
use App\Tag;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
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

    public function edit($id)
    {
        $data = Post::findOrFail($id);
        $types = Type::all();
        $tags = Tag::select('id', 'name')->get();
        // dd($tags);
        return view('posts.edit', compact('data', 'types', 'tags'));
    }

    public function list()
    {
        $posts = Post::all();
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

    public function test()
    {
        return view('monografi.sejarah');
    }
}
