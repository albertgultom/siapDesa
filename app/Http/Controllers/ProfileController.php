<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profiles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Profile::findOrFail(1);
        
        return view('profiles.desa', compact('edit','id'));
        
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
        $edit = Profile::find(1);
        If($request->has('name')){
            $edit -> name = $request -> name;
            }if($request -> has('subdistrict')){
                $edit -> subdistrict = $request -> subdistrict;
            }if ($request -> has('history')){
                $edit -> history = $request -> history;
            }if ($request -> has('vision')){
                $edit -> vision = $request -> vision;
            }if ($request -> has('mission')){
                $edit -> mission = $request -> mission;
            }
            
            $edit->update();
            return redirect()->back()->with(["edit" => $edit] );

        // if ($data -> name = $request -> name){
        //     $data->save();
        // }elseif ($data -> subdistrict = $request -> subdistrict){
        //     $data->save();
        // }elseif ($data -> history = $request -> history){
        //     $data->save();
        // }

        // if ( $this->validate -> request ){
        //     'name' => 'required',
        // }elseif ($this->validate -> request){
        //     'subdistrict' => 'required'
        // }



        // $data = Profile::findOrfail($id);
        // $data -> name = $request -> name;
        // $data -> subdistrict = $request -> subdistrict;
        // $data -> history = $request -> history;
        // $data -> mission = $request -> mission;
        // $data->save();


        // $query = Profile::all();
        // $edit = $query 
        // $edit = Profile::all();
        // $editUpdate = Profile::find($id);
        // $editUpdate -> $edit ['name'];
        // $editUpdate -> $edit ['subdistrict'];
        // $editUpdate -> $edit ['vision'];
        // $editUpdate -> $edit ['mission'];
        
        // $editUpdate->back();


        // $this -> validate($request,[
        //     'name'  => 'required',
        //     'subdistrict' => 'required',
        //     'history' => 'required',
        //     'vision' => 'required',
        //     'mission' => 'required',
        // ]);

        // dd($request->all());
        // $this->validate($request,[
        //     'name'  => 'required',
        //     'subdistrict' => 'required',
        //     'history' => 'required',
        //     'vision' => 'required',
        //     'mission' => 'required',
            
        // ]);
        
        

        // return back()->with('success','Data Updated');

        // if($validate->fails()){
        //     return back()->withErrors($validate)->withInput();
        //     }
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

    public function profil($profil)
    {
        // $id = '1';
        $edit = Profile::find(1);
        // dd($edit);
        if ($profil === 'desa'){
            return view ('profiles.desa', compact('edit'));
        }elseif ($profil === 'sejarah'){
            return view ('profiles.sejarah', compact('edit'));
        }elseif ($profil === 'vismis'){
            return view ('profiles.vismis', compact('edit'));
        }
    }
}

