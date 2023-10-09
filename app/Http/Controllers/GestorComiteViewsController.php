<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGestorRequest;
use App\Http\Requests\UpdateComiteRequest;
use Illuminate\Http\Request;
use App\Models\GestorComite;
use App\Models\Instructor;
use App\Models\SolicitudComite;
use App\Models\Aprendiz;
use App\Models\SolicitudxAprendiz;

class GestorComiteViewsController extends Controller
{
    public function index()
    {
        $solicitudComites = SolicitudComite::latest()->paginate(5);
        $solicitudxAprendiz = SolicitudxAprendiz::latest()->paginate(5);
    
        // Obtén el instructor para cada solicitud y almacénalo en un array asociativo
        $instructors = [];
        $aprendizs = [];
        foreach ($solicitudComites as $solicitud) {
            $instructor = $solicitud->instructor;
    
            if ($instructor) {
                $instructors[$solicitud->id] = $instructor;
            } else {
                $instructors[$solicitud->id] = null;
            }

            foreach ($aprendizs as $aprendiz) {
                $aprendiz[$solicitud->id]=$aprendiz;
            }
            
        }

        
    
        return view('gestorComiteViews.index', compact('solicitudComites', 'instructors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    


    /**
     * Display the specified resource.
     */
    public function show(SolicitudComite $solicituds)
    {
        return view('gestorComiteViews.show', compact('solicituds'));
    }
}
