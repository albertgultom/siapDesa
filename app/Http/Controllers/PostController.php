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
        $post = Post::findOrFail($id)
            ->with('tags');
        // $query = $post->map(function($item){
        //     return [
        //         'id' => $item->id,
        //         'type' => 
        //     ];
        // });
        dd($post);
        // return response()->json($query);
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
