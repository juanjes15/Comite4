<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGestorRequest;
use App\Http\Requests\UpdateComiteRequest;
use Illuminate\Http\Request;
use App\Models\GestorComite;
use App\Models\Instructor;
use App\Models\SolicitudComite;
use App\Models\SolicitudxAprendiz;

class GestorComiteViewsController extends Controller
{
    public function index()
    {
        // Obtén las solicitudes de comité con paginación y carga la relación 'aprendizs'
        $solicitudComites = SolicitudComite::with('aprendizs')->latest()->paginate(5);

        $instructors = [];
        $solicitudDates = [];
        $learnersBySolicitud = []; // Arreglo para agrupar aprendices por solicitud de comité

        foreach ($solicitudComites as $solicitud) {
            // Obtener el instructor asociado a la solicitud
            $instructor = $solicitud->instructor;

            // Obtener la fecha de creación de la solicitud
            $fechaCreacion = $solicitud->created_at;

            // Almacenar la información en los arreglos
            $instructors[$solicitud->id] = $instructor;
            $solicitudDates[$solicitud->id] = $fechaCreacion;
        }

        foreach ($solicitudComites as $solicitud) {
            $solicitudId = $solicitud->id;

            // Verificar si existen aprendices relacionados con esta solicitud
            if ($solicitud->aprendizs->isNotEmpty()) {
                $learnersBySolicitud[$solicitudId] = $solicitud->aprendizs;
            } else {
                $learnersBySolicitud[$solicitudId] = [];
            }
        }

        return view('gestorComiteViews.index', compact('solicitudComites', 'instructors', 'solicitudDates', 'learnersBySolicitud'))
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
