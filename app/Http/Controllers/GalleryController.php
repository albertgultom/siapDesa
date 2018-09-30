<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Gallery;
use App\Content;
use App\Tag;

class GalleryController extends Controller
{
    private $allowedImage = [
        'image/jpeg',
        'image/png',
    ];

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('galleries.index', ['content' => $request->content]);
    }

    public function create(Request $request)
    {
        return view('galleries.create', ['content' => $request->content]);
    }

    public function edit($id)
    {
        $query = Gallery::find($id);
        return view('galleries.edit', ['content' => $query->content]);
    }

    public function show(Request $request, $id)
    {
        $query = Gallery::findOrFail($id);

        if($query->content == 'photo'){
            $contents = $query
                ->contents()
                ->select(['name','image'])
                ->get();
        }else{
            $contents = $query
                ->contents()
                ->select(['name','video'])
                ->get();
        }

        $data = collect([
            'name' => $query->name,
            'date' => $query->updated_at->format('d-m-Y'),
            'type' => $query->type->name,
            'tags' => $query->tags->pluck('name'),
            'content'  => $query->content,
            'contents' => $contents,
        ]);

        return response()->json($data);
    }

    public function list($content)
    {
        $galleries = Gallery::where('content', '=', $content)
            ->orderBy('updated_at', 'desc')
            ->get();
        $data = $galleries->map(function($item){
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
        // dd($data);
        return response()->json($data);
    }
}
