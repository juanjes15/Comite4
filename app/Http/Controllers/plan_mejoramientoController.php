<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;

class Plan_mejoramientoController extends Controller
{
    public function index()
    {

        return view('Plan_mejoramientoViews.index');
    }
    
}
