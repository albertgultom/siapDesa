<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;

class FacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('facility.index');
    }    

    public function list()
    {
        $education = Facility::all();
        $data      = $education->map(function($item){
            return [
                'id'     => $item->id,
                'name'   => $item->name,
                'detail' => $item->detail
            ];
        });
        // dd($data);
        return response()->json($data);
    }        

    public function create()
    {   
        return view ('facility.create');
    }        

    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name'   => 'required',
            'detail' => 'required'
        ]);
        Facility::create($data);
        return redirect()->route('facility.index')->with('success','Data Added');
    }    

    public function edit($id)
    {
        $data = Facility::findOrFail($id);
        return view('facility.edit', compact('data'));
    }    

    public function update(Request $request, $id)
    {
        $query = $this->validate($request,[
            'name'   => 'required',
            'detail' => 'required'
        ]);
        
        Facility::find($id)->update($query);
        // return redirect()->route('type.create')->with('success','Data Added');
        
        return redirect()->route('facility.index')->with('success','Data Updated');
    }    
}
