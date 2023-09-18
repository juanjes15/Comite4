<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGestorRequest;
use App\Http\Requests\UpdateComiteRequest;
use Illuminate\Http\Request;
use App\Models\GestorComite;
use App\Models\SolicitudComite;

class GestorController extends Controller
{

    public function index()
    {
        $solicitudComites = SolicitudComite::latest()->paginate(5);
        return view('gestorComiteViews.index', compact('solicitudComites'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
   

    /**
     * Display the specified resource.
     */
    public function show(SolicitudComite $solicituds)
    {
        return view('gestorComiteViews.show', compact('solicituds'));
    }



    
}
