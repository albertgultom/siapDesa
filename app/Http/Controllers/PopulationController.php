<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Population;
use App\Education;
use App\Occupation;

class PopulationController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    public function index()
    {
        // $this->list();
        return view('populations.index');
    }

    public function show()
    {
        //
    }

    public function list()
    {
        # code...
        $population = Population::orderBy('updated_at', 'desc')->get();
        $data       = $population->map(function($item){
                        $i = 1;
                        if($item->active !== 0){
                            $active = 'checked';
                        }else{
                            $active = '';
                        }
                        return [
                            'id'                       => $item->id,
                            'number_'                  => $i++,
                            'nik'                      => $item->nik,
                            'name'                     => $item->name,
                            'gender'                   => $item->gender,
                            'birthplace_and_birthdate' => $item->birthplace.','.date("d-m-Y", strtotime($item->birthdate)),
                            'bloodtype'                => $item->bloodtype,
                            'religion'                 => $item->religion,
                            'status'                   => $item->status,
                            'education'                => $item->education->name,
                            'occupation'               => $item->occupation->name,
                            'active'                   => $active,
                            'created'                  => $item->updated_at->format('d-m-Y')
                        ];
                    });

        // dd($data[0]);                                
        return response()->json($data);
    }

    public function create()
    {
        $edu      = Education::select('id', 'name')->get();
        $occu     = Occupation::select('id', 'name')->get();
        $gender   = $this->gender();
        $religion = $this->religion();
        $status   = $this->status_nikah();
        // dd($gender[0]['id']);
        return view('populations.create', compact('edu', 'occu', 'gender', 'religion', 'status'));
    }
    
    public function gender()
    {
        return array(
                        array(
                            'id'   => 'L',
                            'name' => 'Laki-Laki'
                        ),
                        array(
                            'id'   => 'P',
                            'name' => 'Perempuan'
                        )                        
                    );
    }        

    public function religion()
    {
        return array(
                        array(
                            'id'   => 'Islam',
                            'name' => 'Islam'
                        ),
                        array(
                            'id'   => 'Kristen Protestan',
                            'name' => 'Kristen Protestan'
                        ),
                        array(
                            'id'   => 'Kristen Katolik',
                            'name' => 'Kristen Katolik'
                        ),
                        array(
                            'id'   => 'Hindu',
                            'name' => 'Hindu'
                        ),
                        array(
                            'id'   => 'Buddha',
                            'name' => 'Buddha'
                        ),
                        array(
                            'id'   => 'Kepercayaan Lainnya',
                            'name' => 'Kepercayaan Lainnya'
                        )                        
                    );
    }        
    
    public function status_nikah()
    {
        return array(
                        array(
                            'id'   => 'Kawin',
                            'name' => 'Kawin'
                        ),
                        array(
                            'id'   => 'Belum Kawin',
                            'name' => 'Belum Kawin'
                        ),
                        array(
                            'id'   => 'Cerai Hidup',
                            'name' => 'Cerai Hidup'
                        )                        
                    );
    }            

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'nik'           => 'required',
            'name'          => 'required',
            'gender'        => 'required',
            'birthplace'    => 'required',
            'birthdate'     => 'required',
            'bloodtype'     => 'required',
            'religion'      => 'required',
            'status'        => 'required',
            'nik'           => 'required',
            'active'        => 'required',
            'education_id'  => 'required',
            'occupation_id' => 'required'
        ]);

        if($request->active == null){
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
        }

        Population::create($data);
        return redirect()->route('population.index')->with('success','Data Added');
    }    

    public function edit($id)
    {
        $data     = Population::findOrFail($id);
        $edu      = Education::select('id', 'name')->get();
        $occu     = Occupation::select('id', 'name')->get();
        $gender   = $this->gender();
        $religion = $this->religion();
        $status   = $this->status_nikah();
        // dd($gender[0]['id']);
        return view('populations.edit', compact('data','edu', 'occu', 'gender', 'religion', 'status'));
    }    

    public function update(Request $request, $id)
    {
        $query = $this->validate($request,[
            'nik'           => 'required',
            'name'          => 'required',
            'gender'        => 'required',
            'birthplace'    => 'required',
            'birthdate'     => 'required',
            'bloodtype'     => 'required',
            'religion'      => 'required',
            'status'        => 'required',
            'nik'           => 'required',
            'education_id'  => 'required',
            'occupation_id' => 'required'
        ]);

        if($request->active == null){
            $data['active'] = '0';
        }else{
            $data['active'] = '1';
        }

        Population::find($id)->update($query);        
        return redirect()->route('population.index')->with('success','Data Updated');
    }    
}
