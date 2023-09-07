<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;

class AprenController extends Controller
{
    public function index()
    {
        $comites = Comite::all();

        return view('aprendiz_Views.index', compact('comites'));
    }
    
}
