<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apparatus;

class ApparatusController extends Controller
{
    public function index()
    {
        $data = Apparatus::orderBy('number', 'asc')->get();
        // dd($data);
        return view('apparatuses.index', compact('data'));
    }
}
