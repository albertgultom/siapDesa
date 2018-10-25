<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Juristical;
use Carbon\Carbon;

class JuristicalController extends Controller
{
    private $allowedFile = [
        'application/msword',
        'application/vnd.ms-powerpoint', 
        'application/pdf',
    ];

    public function __construct()
    {
        $this->middleware('auth')->except(['list']);
    }

    public function index()
    {
        return view('juristicals.index');
    }

    public function create()
    {
        return view('juristicals.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $this->validate($request, [
            'name' => 'required|max:100',
            'file' => 'required',
            'detail' => 'required',
        ]);

        $data['created_at'] = Carbon::now(); 
        $data['updated_at'] = Carbon::now();       

        if($request->active == null){
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
        }

        if($request->hasFile('file')){
            $extension = $request->file->getMimeType();
            if (! in_array($extension, $this->allowedFile)) {
                return back()->withInput()->withErrors(array('file' => 'Tipe file tidak di dukung.'));
            }else{
                $date = date('ymdhis_');
                $file = $request->file->getClientOriginalName();
                $filename = $date . str_replace(' ', '_', strtolower($file));
                $store = $request->file->storeAs('public/juristicals', $filename);
                $data['file'] = $filename;
            }
        }

        $create = Juristical::insertGetId($data);
        if(!$create){
            return back()->with('alert-danger', 'Data tidak dapat di simpan.');
        }

        return redirect()->route('juristical.index')->with('alert-info', 'Data telah di simpan.');
    }
    
    public function edit($id)
    {
        $data = Juristical::findOrFail($id);

        return view('juristicals.edit', compact('data'));
    }

    public function update(Request $request)
    {}

    public function list()
    {
        $request = Juristical::all();
        $data = $request->map(function($i){
            if($i->active == 1){
                $active = 'checked';
            }else{
                $active = '';
            }
            return [
                'id' => $i->id,
                'name' => $i->name,
                'detail' => $i->detail,
                'file' => $i->file,
                'active' => $active,
                'created' => $i->updated_at->format('d-m-Y')
            ];
        });
        return response()->json($data);
    }
}
