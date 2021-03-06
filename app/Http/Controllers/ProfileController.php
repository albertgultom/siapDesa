<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;


class ProfileController extends Controller
{
    private $allowedImage = [
        'image/jpeg',
        'image/png',
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all()->toArray();
        return view('landing', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        
        // $edit->update();
        // return redirect()->back()->with(["edit" => $edit] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $edit = Profile::find(1);
        if($request->hasFile('image_structure')){
            $extension = $request->image_structure->getMimeType();
            if (! in_array($extension, $this->allowedImage)) {
                return back()->withInput()->withErrors(array('image_structure' => 'Tipe file tidak di dukung.'));
            }else{
                $date = date('ymdhis_');
                $file = $request->image_structure->getClientOriginalName();
                $filename = $date . str_replace(' ', '_', strtolower($file));
                $store = $request->image_structure->storeAs('public/images', $filename);
                $edit['image_structure'] = $filename;
            }
        }if($request->hasFile('map')){
            $extension = $request->map->getMimeType();
            if (! in_array($extension, $this->allowedImage)) {
                return back()->withInput()->withErrors(array('map' => 'Tipe file tidak di dukung.'));
            }else{
                $date = date('ymdhis_');
                $file = $request->map->getClientOriginalName();
                $filename = $date . str_replace(' ', '_', strtolower($file));
                $store = $request->map->storeAs('public/images', $filename);
                $edit['map'] = $filename;
            }
        }
        
        $edit->update();
        return redirect()->back()->with(["edit" => $edit] );
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
            }if ($request -> has('province')){
                $edit -> province = $request -> province;
            }if ($request -> has('history')){
                $edit -> history = $request -> history;
            }if ($request -> has('vision')){
                $edit -> vision = $request -> vision;
            }if ($request -> has('mission')){
                $edit -> mission = $request -> mission;
            }if ($request -> has('district')){
                $edit -> district = $request -> district;
            }if ($request -> has('zip_code')){
                $edit -> zip_code = $request -> zip_code;
            }if ($request -> has('phone')){
                $edit -> phone = $request -> phone;
            }if ($request -> has('email')){
                $edit -> email = $request -> email;
            }
            if ($request -> has('image_profile')){
                $edit -> image_profile = $request -> image_profile;
            }
            if ($request -> has('headman')){
                $edit -> headman = $request -> headman;
            }if ($request -> has('image_headman')){
                $edit -> image_headman = $request -> image_headman;

            }
            if($request->hasFile('image_profile')){
                $extension = $request->image_profile->getMimeType();
                if (! in_array($extension, $this->allowedImage)) {
                    return back()->withInput()->withErrors(array('image_profile' => 'Tipe file tidak di dukung.'));
                }else{
                    $date = date('ymdhis_');
                    $file = $request->image_profile->getClientOriginalName();
                    $filename = $date . str_replace(' ', '_', strtolower($file));
                    $store = $request->image_profile->storeAs('public/images', $filename);
                    $edit['image_profile'] = $filename;
                }
            }
            
               
            // dd($edit);
            $edit->update();
            return redirect()->back()->with(["edit" => $edit] );
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
        }elseif ($profil === 'struktur'){
            return view ('profiles.struktur', compact('edit'));
        }elseif ($profil === 'map'){
            return view ('profiles.map', compact('edit'));
        }
    }


}

