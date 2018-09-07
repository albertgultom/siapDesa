<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $query = Tag::orderBy('updated_at', 'desc')->get();
        // dd($query);
        return view('tags.index', ['data' => $query]);
    }

    public function show($id)
    {
        $query = Tag::findOrFail($id);
        // dd($query);
        return response()->json($query);
    }

    public function store(Request $request)
    {
        if($request->tagid != null){
            $result = Tag::find($request->tagid)->update(['name' => $request->tagname]);
            // return response()->json($request, 200);
        }else{
            $result = Tag::create(['name' => $request->tagname]);
            // return response()->json($result, 200);
        }

        return redirect('tag');
    }
}
