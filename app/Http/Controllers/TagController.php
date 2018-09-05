<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $query = Tag::all();
        // dd($query);
        return response()->json($query);
    }

    public function show($id)
    {
        $query = Tag::findOrFail($id);
        dd($query);
    }
}
