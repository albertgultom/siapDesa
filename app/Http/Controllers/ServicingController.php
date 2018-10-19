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
        $this->middleware('auth');
    }

    public function servicings($name=NULL,$arg)
    {
        # code...
        $servicing = Servicing::where($arg,$name)->orderBy('updated_at', 'desc')->get();
        $data      = $servicing->map(function($item){
                        $i = 1;
                        return [
                            'id'            => $item->id,
                            'population_id' => $item->population_id,
                            'facility_id'   => $item->facility_id,
                            'nik'           => $item->populations['nik'],
                            'name'          => $item->populations['name'],
                            'facilty'       => $item->facilities['name'],
                            'updated_at'    => $item->updated_at->format('d-m-Y')
                        ];
                    });

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
        return response()->json($this->servicings('dibuat','status'));;
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

        $check = Population::where([['id','=',$data['population_id']],['active','=',1]])->get();
        $data_store  = $check->map(function($item){
            return [
                'population_id'         => $item->id
            ];
        });
        
        if ($data_store->count() == 0) {
            # code...
            $res_data = array
            (
                'status' => 0,
                'text'   => 'NIK tidak aktif.'
            );
        }
        else 
        {        
            Servicing::create($data);
            return redirect()->route('new')->with('success','Data Added');        
        }
    }    

    public function new_edit($id)
    {
        # code...
        $data        = Servicing::findOrFail($id);
        $populations = Population::select('id', 'nik')->get();
        $facilities  = Facility::select('id', 'name')->get();
        $data['status'] = 'dibuat';
        $data['flag']   = 0;
        $data['title']  = 'Ubah Daftar Pelayanan';  
        return view('servicing.new.edit', compact('populations', 'facilities', 'data'));                
    }

    public function new_verify($id)
    {
        # code...
        $data        = Servicing::findOrFail($id);
        $populations = Population::select('id', 'nik')->get();
        $facilities  = Facility::select('id', 'name')->get();
        $data['status'] = 'diproses';
        $data['flag']   = 1;
        $data['title']  = 'Verifikasi Daftar Pelayanan';
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
    
    /************************************/

    public function process_service()
    {
        # code...
        return view('servicing.process.index');        
    }

    public function process_services()
    {
        # code...
        return response()->json($this->servicings('diproses','status'));
    }    

    public function process_verify($id)
    {
        # code...
        $data        = Servicing::findOrFail($id);
        $populations = Population::select('id', 'nik')->get();
        $facilities  = Facility::select('id', 'name')->get();
        $data['status'] = 'selesai';
        $data['flag']   = 1;
        $data['title']  = 'Verifikasi Layanan Yang Telah diproses';
        return view('servicing.new.edit', compact('populations', 'facilities', 'data'));                        
    }

    public function done_service()
    {
        # code...
        return view('servicing.done.index');        
    }

    public function done_services()
    {
        # code...
        return response()->json($this->servicings('selesai','status'));;
    }    

    public function counter_services($name)
    {
        # code...
        return response()->json(count($this->servicings($name,'status')));;        
    }
}
