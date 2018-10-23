<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Criteria;
use App\Tabulation;

class CriteriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Criteria::where('criteriaable_id', null)
        ->get();
        
        // dd($data);
        // return response()->json($data);
        return view('criterias.index', compact('data'));
    }
    
    public function show($id,$arg=NULL)
    {
        $query = Criteria::find($id);
        if ($arg == 'data') {
            # code...
            return $query;                        
        } elseif ($arg == 'json') {
            # code...
            return response()->json($query);            
        } 
    }

    public function create()
    {
        $data = Criteria::where('criteriaable_id', null)->get();
        // dd($data);
        return view('criterias.create', compact('data'));
    }

    public function branch($id)
    {
        # code...
        $data = $this->show($id,'data');
        // dd($data);
        return view('criterias.create_branch', compact('data','id'));        
    }

    public function store(Request $request)
    {
        # code...
        $res_data = "";
        if ($request->tree == 4) {
            # code...
            $data     = $this->validate($request,[
                'name'     => 'required',
                'numeral'  => 'required',
                'identity' => 'required'
            ]);            
            $data['criteria_id']        = $request->oid;
            $data['numeral_2']          = 0;
            $data['identity_2']         = 0;
            $data['status_available_2'] = 0;
            Tabulation::create($data);
            $res_data = array
            (
                'status' => 1,
                'text'   => 'Formasi daftar potensi telah ditambahkan',
                'url'    => '/potency/criteria/create '
            );                

        } else {
            # code...
            $data_1     = $this->validate($request,[
                'name'     => 'required'
            ]);            
            $data_1['criteriaable_id']   = $request->oid;
            $data_1['criteriaable_type'] = 'App\Criteria';
            $data_1['tree']              = $request->tree + 1;
            if (($request->tree + 1) == 1) {
                # code...
                $data_1['criteriaable_id']   = NULL;                
            }
            Criteria::create($data_1);
            $res_data = array
            (
                'status' => 1,
                'text'   => 'Formasi daftar potensi telah ditambahkan',
                'url'    => '/potency/criteria/create '
            );                            
        }
        
        return response()->json($res_data);        

    }

}
