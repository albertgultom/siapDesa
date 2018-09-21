<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apparatus;

class ApparatusController extends Controller
{
    public function index()
    {
        
        return view('apparatuses.index');
    }
}
