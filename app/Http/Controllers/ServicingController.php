<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Population;
use App\Servicing;
use App\Facility;

class ServicingController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function servicings($name=NULL)
    {
        # code...
        $servicing = Servicing::where('status',$name)->get();
        $data      = $servicing->map(function($item){
                        $i = 1;
                        return [
                            'id'      => $item->id,
                            'nik'     => $item->populations['nik'],
                            'name'    => $item->populations['name'],
                            'facilty' => $item->facilities['name']
                        ];
                    });

        // dd($data);                                   
        return $data;        
    }    

    public function new()
    {
        // $this->list_new();
        return view('servicing.new.index');
    }    

    public function news()
    {
        # code...
        return response()->json($this->servicings('dibuat'));;
    }

    public function new_create()
    {
        # code...
        $populations = Population::select('id', 'nik')->get();
        $facilities  = Facility::select('id', 'name')->get();

        return view('servicing.new.create', compact('populations', 'facilities'));        
    }

    public function new_store(Request $request)
    {
        $data = $this->validate($request,[
            'population_id' => 'required',
            'facility_id'   => 'required'
        ]);

        Servicing::create($data);
        return redirect()->route('new')->with('success','Data Added');
    }    

    public function new_edit($id)
    {
        # code...
        $data        = Servicing::findOrFail($id);
        $populations = Population::select('id', 'nik')->get();
        $facilities  = Facility::select('id', 'name')->get();
        $data['status'] = 'dibuat';
        $data['flag']   = 0;
        $data['title']  = 'Verifikas Daftar Pelayanan';        
        view('servicing.new.edit', compact('populations', 'facilities', 'data'));                
    }

    public function new_verify($id)
    {
        # code...
        $data        = Servicing::findOrFail($id);
        $populations = Population::select('id', 'nik')->get();
        $facilities  = Facility::select('id', 'name')->get();
        $data['status'] = 'diproses';
        $data['flag']   = 1;
        $data['title']  = 'Verifikas Daftar Pelayanan';
        return view('servicing.new.edit', compact('populations', 'facilities', 'data'));                
    }    

    public function new_update(Request $request,$id)
    {
        $data = "";
        if ($request->status == 'dibuat') {
            # code...
            $data = $this->validate($request,[
                'population_id' => 'required',
                'facility_id'   => 'required'
            ]);            
        }
        else {
            # code...
            $data = $this->validate($request,[
                'status' => 'required'
            ]);                        
        }


        Servicing::find($id)->update($data);                
        return redirect()->route('new')->with('success','Data Added');
    } 
    
    public function process_services()
    {
        # code...
        return response()->json($this->servicings('diproses'));;
    }    
}
