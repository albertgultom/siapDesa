<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Criteria;
use App\Tabulation;
use App\Tabulations_detail;

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

    public function show_tabulations($id,$arg=NULL)
    {
        $query = Tabulation::where([['criteria_id','=',$id]])->get();
        if ($arg == 'data') {
            # code...
            if (count($query) == 0) {
                # code...
                return array();
            } else {
                # code...
                return $query;
            }                        
        } elseif ($arg == 'json') {
            # code...
            return response()->json($query);            
        } 
    }    

    public function create()
    {
        $data = Criteria::where('criteriaable_id', null)->get();
        return view('criterias.create', compact('data'));
    }

    public function branch($id)
    {
        # code...
        $data               = $this->show($id,'data');
        $comparative        = ($data != null) ? $data->comparative : '0';
        $tabulations        = 0;
        $detail_tabulations = null;
        if ($comparative == 0) {
            # code...
            $tabulations = 0;
        } 
        else {
            # code...
            $tabulations = $this->show_tabulations($data->id,'data');
            // dd($tabulations);
            if ($tabulations != array()) {
                # code...
                $detail_tabulations = Tabulations_detail::where([['tabulations_id','=',$tabulations[0]->id]])->get();
            }
            else {
                # code...
                $detail_tabulations = 0;
            }
        }

        return view('criterias.create_branch', compact('data', 'id', 'comparative', 'tabulations', 'detail_tabulations'));        
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
            Tabulation::create($data);
            $res_data = array
            (
                'status' => 1,
                'text'   => 'Formasi daftar potensi telah ditambahkan',
                'url'    => '/potency/criteria/create '
            );                

        } else {
            # code...
            // dd($request);            
            if ($request->comparative_parent == 0) {
                # code...
                $data_1     = $this->validate($request,[
                    'name'     => 'required'
                ]);            
                $data_1['criteriaable_id']   = $request->oid;
                $data_1['criteriaable_type'] = 'App\Criteria';
                $data_1['tree']              = $request->tree + 1;
                $data_1['comparative']       = $request->comparative;
                if (($request->tree + 1) == 1)$data_1['criteriaable_id'] = NULL;
            
                if ($request->flag_decimal == 'on') {
                    # code...
                    $data_1['flag_decimal']       = 1;                    
                } elseif ($request->flag_decimal == 'off') {
                    # code...
                    $data_1['flag_decimal']       = 0;                                        
                } 
                
                Criteria::create($data_1);
                $res_data = array
                (
                    'status' => 1,
                    'text'   => 'Formasi daftar potensi telah ditambahkan',
                    'url'    => '/potency/criteria/create '
                );                                            
            }
            elseif ($request->comparative_parent == 1) {
                # code...
                $data     = $this->validate($request,[
                    'name'     => 'required',
                    'numeral'  => 'required',
                    'identity' => 'required'
                ]);            
                $data['criteria_id'] = $request->oid;
                $data['comparative'] = $request->comparative_parent;
                $data['flag_decimal'] = $request->flag_decimal_parent;                
                Tabulation::create($data);
                $res_data = array
                (
                    'status' => 1,
                    'text'   => 'Formasi daftar potensi telah ditambahkan',
                    'url'    => '/potency/criteria/create '
                );                
            }
        }
        
        return response()->json($res_data);        

    }

    public function new_store(Request $request)
    {
        $data_detail = $request->data_detail;
        $tabulations = $this->show_tabulations($request->oid_parent,'data');
        $data['criteria_id'] = $request->oid_parent;
        $data['name']        = 0;
        $data['numeral']     = 0;
        $data['identity']    = 0;
        $data['comparative'] = $request->comparative_parent;
        $header_id = Tabulation::insertGetId($data);
        $res_data = array
        (
            'status' => 1,
            'text'   => 'Formasi daftar potensi telah ditambahkan',
            'url'    => '/potency/criteria/create '
        );
        
        if ($request->comparative_parent > 1) {
            # code...
            for ($i=0; $i <= $request->comparative_parent; $i++) { 
                # code...
                $data_detail_store['criteria_id']    = $request->oid_parent;
                $data_detail_store['tabulations_id'] = $header_id;
                if ($tabulations == array()) {
                    # code...
                    $data_detail_store['name']     = $data_detail[$i]['data'];
                    $data_detail_store['title']    = $data_detail[$i]['data'];
                    $data_detail_store['numeral']  = 0;
                    $data_detail_store['identity'] = 0;
                } else {
                    # code...
                    if ($i == 0) {
                        # code...
                        $data_detail_store['name']     = $data_detail[$i]['data'];
                        $data_detail_store['numeral']  = 0;
                        $data_detail_store['identity'] = 0;
                        $data_detail_store['title']    = 0;
                    }
                    else {
                        # code...
                        $data_detail_store['name']     = 0;
                        $data_detail_store['numeral']  = $data_detail[$i]['data'];
                        $data_detail_store['identity'] = 0;
                        $data_detail_store['title']    = 0;                        
                    }
                }
                $data_detail_store['comparative']    = $request->comparative_parent;
                Tabulations_detail::create($data_detail_store);
                $res_data = array
                (
                    'status' => 1,
                    'text'   => 'Formasi daftar potensi telah ditambahkan',
                    'url'    => '/potency/criteria/create '
                );                
            }
        }

        return response()->json($res_data);        
    }    

    public function detail_tabulations($id)
    {
        # code...
    }
}
