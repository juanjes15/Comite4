<?php

namespace App\Http\Controllers;
use App\Models\SolicitudComite;
<<<<<<< HEAD
use App\Models\Aprendiz;
use App\Models\SolicitudxAprendiz;
=======
use App\Models\Norma_Infringida;
use App\Models\Aprendiz;
use App\Models\Prueba;
use App\Models\Articulo;
use App\Models\Numeral;
use App\Models\Capitulo;



>>>>>>> 25a8ea7095d888ac04e24f83f98902d59a44a5d8

class GestorComiteViewsController extends Controller
{
    public function index()
<<<<<<< HEAD
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
            
=======
{
    // Obtén las solicitudes de comité con paginación y carga la relación 'aprendizs'
    $solicitudComites = SolicitudComite::with('aprendizs')->latest()->paginate();

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
>>>>>>> 25a8ea7095d888ac04e24f83f98902d59a44a5d8
        }

        
    
        return view('gestorComiteViews.index', compact('solicitudComites', 'instructors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
<<<<<<< HEAD
    
=======


    // Establecer la sesión con los detalles de los aprendices por solicitud
    session(['learners_by_solicitud' => $learnersBySolicitud]);

    return view('gestorComiteViews.index', compact('solicitudComites', 'instructors', 'solicitudDates', 'learnersBySolicitud'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
}
>>>>>>> 25a8ea7095d888ac04e24f83f98902d59a44a5d8




    /**
     * Display the specified resource.
     */
    public function show(SolicitudComite $solicituds)
    {

        $this->authorize('administrar');

        // Obtén el ID de la solicitud desde la sesión
        $sol_id = session('sol_id');

        // Obtén las faltas relacionadas con la solicitud
        $normasInfringidas = Norma_Infringida::where('sol_id', $sol_id)->get();

        // Obtén el ID del aprendiz desde la sesión
        $apr_id = session('apr_id');

        // Obtén los datos de la solicitud
        $solicitud = SolicitudComite::find($sol_id);

        // Obtén los datos del aprendiz
        $aprendiz = Aprendiz::find($apr_id);

        // Obtén los datos de la prueba
        $prueba = Prueba::where('sol_id', $sol_id)->first();

        // Obtén el valor seleccionado en la sesión para capítulo
        $selectedCapId = session('selected_cap_id');
        // Obtén el capítulo relacionado con el $selectedCapId
        $capitulo = Capitulo::find($selectedCapId);

        // Ahora, puedes acceder al campo cap_numero
        $cap_numero = $capitulo->cap_numero;
        $cap_descripcion = $capitulo->cap_descripcion;

        // Obtén los valores seleccionados en la sesión para artículos
        $selectedArtIds = session('selected_art_ids', []); // Obtener los valores, si no hay ninguno, se usará un array vacío
        // Obtén los artículos relacionados con los $selectedArtIds
        $articulos = Articulo::where('id', $selectedArtIds)->get();

        //Consulta JJ
        // Recupera la solicitud de comité con sus aprendices relacionados
        $solicitudComite = SolicitudComite::with('aprendizs', 'numerals')->find($sol_id);
        // Ahora, puedes acceder a los aprendices relacionados
        $aprendices = $solicitudComite->aprendizs;
        $normaxd = $solicitudComite->numerals;


        // Obtén los IDs de numerales almacenados en la sesión
        $selectedNumIds = session('selected_num_ids', []);
        // Filtra los numerales por los IDs almacenados en la sesión
        $numerals = Numeral::whereIn('id', $selectedNumIds)->get();




        return view('gestorComiteViews.detalles', compact(
            'solicitud',
            'aprendiz',
            'prueba',
            'aprendices',
            'selectedCapId',
            'cap_numero',
            'selectedArtIds',
            'articulos', // Agregamos la variable $articulos aquí
            'cap_descripcion',
            'numerals',
            'normaxd'
        ));
    }
}
