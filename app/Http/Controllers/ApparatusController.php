<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apparatus;

class ApparatusController extends Controller
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
        $data = Apparatus::orderBy('number', 'asc')->get();
        // $data = Apparatus::where('active', '=', 1)
        // ->orderBy('updated_at','desc');
        // dd($data);
        
        

        return view('apparatuses.index', compact('data'));
    }
    public function show($id)
    {
        $query = Apparatus::findOrFail($id);
        // dd($query);
        return response()->json($query);
    }
    public function store(request $request)
    {
        if($request->active == null){
            $request['active'] = '0';
        }else{
            $request['active'] = '1';
        }
        
        if($request->hasFile('apImage')){
            $extension = $request->apImage->getMimeType();
            if (! in_array($extension, $this->allowedImage)) {
                return back()->withInput()->withErrors(array('apImage' => 'Tipe file tidak di dukung.'));
            }else{
                $date = date('ymdhis_');
                $file = $request->apImage->getClientOriginalName();
                $filename = $date . str_replace(' ', '_', strtolower($file));
                $store = $request->apImage->storeAs('public/apparatus', $filename);
                $request['image'] = $filename;
               
            }
        }
        $data = $this->validate($request, [
            'position' => 'required',
            'name' => 'required|max:191',
            'image' => '',
            'number' => 'required',
            'active' => 'required'
        ]);

        if($request->apparatusId != null){
            Apparatus::find($request->apparatusId)->update($data);
            return back()->with('alert-success', 'Data Aparatur berhasil diupdate.');
            
        }else{
            $result = Apparatus::create([
                'name' => $request->name,
                'position' => $request->position,
                'number' => $request->number,
                'image' => $request->image,
                'active' => $request->active
            ]);
            
            return back()->with('alert-success', 'Data Aparatur berhasil diupdate.');
        }
        
        // return redirect('apparatus');
    }
    
}
