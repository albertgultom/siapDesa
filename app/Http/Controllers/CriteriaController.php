<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Criteria;

class CriteriaController extends Controller
{
    public function index()
    {
        $query = Criteria::find(1);
        return response()->json($query);
    }

}
