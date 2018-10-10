<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Occupation;

class OccupationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('occupations.index');
    }

    public function list()
    {
        $occupation = Occupation::all();
        $data       = $occupation->map(function($item){
            return [
                'id' => $item->id,
                'name' => $item->name
            ];
        });
        // dd($data);
        return response()->json($data);
    }       
    
    public function create()
    {   
        return view ('occupations.create');
    }        

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required'
        ]);
        Occupation::create($data);
        return redirect()->route('occupation.index')->with('success','Data Added');
    }
    
    public function edit($id)
    {
        $data = Occupation::findOrFail($id);
        return view('occupations.edit', compact('data'));
    }    

    public function update(Request $request, $id)
    {
        $query = $this->validate($request,[
            'name'  => 'required'
        ]);
        
        Occupation::find($id)->update($query);
        // return redirect()->route('type.create')->with('success','Data Added');
        
        return redirect()->route('occupation.index')->with('success','Data Updated');
    }    
}
