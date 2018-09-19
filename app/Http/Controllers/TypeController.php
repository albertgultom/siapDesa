<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view ('types.create');
    }


    public function list()
    {
        $types = Type::all();
        $data = $types->map(function($item){
            return [
                'id' => $item->id,
                'name' => $item->name,
                'level' => $item->level,
                'created' => $item->updated_at->format('d-m-Y')
            ];
        });
        // dd($data);
        return response()->json($data);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori= $this->validate($request,[
            'name' => 'required',
            'level' => 'required'
        ]);
        Type::create($kategori);
        return redirect()->route('type.index')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $query = Type::findOrFail($id);
        return view('types.detail');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Type::findOrFail($id);
        
        return view('types.edit', compact('edit','id'));
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
        $query=$this->validate($request,[
            'name'  => 'required',
            'level' => 'required'
        ]);
        
        // $edit = edit::find($id);
        // $edit->name=$request->get('name');
        // $edit->level=$request->get('level');
        // $edit->save();
        Type::find($id)->update($query);
        // return redirect()->route('type.create')->with('success','Data Added');
        
        return redirect()->route('type.index')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
