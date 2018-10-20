<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Gallery;
use App\Content;
use App\Tag;
use App\Type;
use Carbon\Carbon;

class GalleryController extends Controller
{
    private $allowedImage = [
        'image/jpeg',
        'image/png',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $content = $request->content;        
        return view('galleries.index', compact('content'));
    }

    public function create(Request $request)
    {
        // dd($request);
        $types           = Type::all();
        $tags            = Tag::select('id', 'name')->get();
        $request_content = $request->content;
        return view('galleries.create', compact('tags','types','request_content'));
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

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'type_id' => 'required',
            'name'    => 'required|max:191',
            'content' => 'required',
        ]);
        // test user
        $data['user_id'] = '2';
        $data['created_at'] = Carbon::now(); 
        $data['updated_at'] = Carbon::now();       

        if($request->active == null){
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
        }

        $gallery = Gallery::insertGetId($data);
        if(!$gallery){
            return back()->with('alert-danger', 'Gallery '.$request->content.' tidak dapat di simpan.');
        }

        $count = count($request->tags);
        if($count > 0){
            $galleryId = Gallery::find($gallery);
            $galleryId->tags()->attach($request->tags);
        }
        // dd($request->tags);
        return redirect()->route('gallery.index', ['content' => $request->content])->with('success','Data Added');
    }

    public function content($request,$id)
    {   
        $contents        = Content::find($id);
        $request_content = $request;
        return view('galleries.content', compact('request_content','contents','id'));
    }    

    public function store_content(Request $request)
    {
        # code...
        $data = $this->validate($request, [
            'name'       => 'required|max:191',
            'content'    => 'required',
            'gallery_id' => 'required',
        ]);        


        if ($request->content == 'photo') {
            # code...
            $data_store = $this->validate($request, [
                'name'       => 'required|max:191',
                'image'      => 'required',
                'gallery_id' => 'required',
            ]);        

            if($request->hasFile('image')){
                $extension = $request->image->getMimeType();
                if (! in_array($extension, $this->allowedImage)) {
                    return back()->withInput()->withErrors(array('image' => 'Tipe file tidak di dukung.'));
                }else{
                    $date = date('ymdhis_');
                    $file = $request->image->getClientOriginalName();
                    $filename = $date . str_replace(' ', '_', strtolower($file));
                    $store = $request->image->storeAs('public/photos', $filename);
                    $data_store['image'] = $filename;
                }
            }
    
            $data_store['active'] = '1';
    
            $gallery = Content::insertGetId($data_store);
            if(!$gallery){
                return back()->with('alert-danger', 'Gallery '.$request->content.' tidak dapat di simpan.');
            }            
        }
        else if ($request->content == 'video') {
            # code...
            $data_store = $this->validate($request, [
                'name'       => 'required|max:191',
                'video'      => 'required',
                'gallery_id' => 'required',
            ]);                    
            $data_store['active'] = '1';            

            if (strpos($data_store['video'], 'youtube.com/watch?v=') !== false) {
                $data_store['video'] = str_replace('youtube.com/watch?v=','youtube.com/embed/',$data_store['video']);            
            }

            $gallery = Content::insertGetId($data_store);
            if(!$gallery){
                return back()->with('alert-danger', 'Gallery '.$request->content.' tidak dapat di simpan.');
            }                        
        }


        return redirect()->route('gallery.index', ['content' => $request->content])->with('success','Data Added');        
    }

}
