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
        // dd($request);
        $query = $this->validate($request,[
            'name'  => 'required',
            'subdistrict' => 'required',
            'history' => 'required'
        ]);
        Profile::find($id)->update($query);

        return back()->with('success','Data Updated');
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
        if ($profil === 'desa' ){
            return view ('profiles.desa', compact('edit'));
        }
        elseif ($profil === 'sejarah' ){
            return view ('profiles.sejarah', compact('edit'));
        }
        elseif ($profil === 'vismis' ){
            dd($edit);
            return view ('profiles.vismis', compact('edit'));
        }
    }
}

