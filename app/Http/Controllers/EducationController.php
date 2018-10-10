<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;

class EducationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('education.index');
    }

    public function list()
    {
        $education = Education::all();
        $data      = $education->map(function($item){
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
        return view ('education.create');
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'name' => 'required'
        ]);
        Education::create($data);
        return redirect()->route('education.index')->with('success','Data Added');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Education::findOrFail($id);
        return view('education.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $query = $this->validate($request,[
            'name'  => 'required'
        ]);
        
        Education::find($id)->update($query);
        // return redirect()->route('type.create')->with('success','Data Added');
        
        return redirect()->route('education.index')->with('success','Data Updated');
    }


}
