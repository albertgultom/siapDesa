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
    public function index()
    {
        $data = Apparatus::orderBy('number', 'asc')->get();
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
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
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
               
            }
        }
        // dd($request);
        if($request->apparatusesid != null){
            $result = Apparatus::find($request->apparatusid)->update(['name' => $request->apName],['position' => $request->apPosition]);
            // return response()->json($request, 200);
        
        }else{
            $result = Apparatus::create([
                'name' => $request->name,
                'position' => $request->position,
                'number' => $request->number,
                'image' => $filename,
                'active' => $request->active
                ]);
            
        }
        // $data = Apparatus::orderBy('number', 'asc')->get();
        return redirect('apparatus');
    }
    
}
