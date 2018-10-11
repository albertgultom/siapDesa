<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Criteria;

class CriteriaController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $data = Criteria::where('criteriaable_id', null)
        ->get();
        
        // dd($data);
        // return response()->json($data);
        return view('criterias.index', compact('data'));
    }
    
    public function show($id)
    {
        $query = Criteria::find(1);
        return response()->json($query);
    }

}
