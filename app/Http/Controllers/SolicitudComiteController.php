<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitudComiteRequest;
use App\Http\Requests\UpdateSolicitudComiteRequest;
use App\Models\Aprendiz;
use App\Models\SolicitudComite;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Capitulo;
use App\Models\Articulo;
use App\Models\Numeral;
use Illuminate\Http\Request;

class SolicitudComiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programas = Programa::all();
        $solicitudComites = SolicitudComite::latest()->paginate(5);
        return view('solicitudComites.index', compact('solicitudComites','programas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }



    public function create()
    {

        $instructors = Instructor::all();
        $aprendizs = Aprendiz::all();
        $programas = Programa::all();
        $capitulos = Capitulo::all();
        $articulos = Articulo::all();
        $numerals = Numeral::all();


        return view('solicitudComites.create', compact('instructors','aprendizs','programas','capitulos','articulos','numerals'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSolicitudComiteRequest $request)
    {

        SolicitudComite::create($request->validated());
        return redirect()->route('solicitudComites.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SolicitudComite $solicitudComite)
    {
        return view('solicitudComites.show', compact('solicitudComite'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SolicitudComite $solicitudComite)
    {
        $instructors = Instructor::all(); // Obtén todos los instructores
        return view('solicitudComites.edit', compact('solicitudComite','instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSolicitudComiteRequest $request, SolicitudComite $solicitudComite)
    {

        $solicitudComite->update($request->validated());
        return redirect()->route('solicitudComites.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SolicitudComite $solicitudComite)
    {

        $solicitudComite->delete();
        return redirect()->route('solicitudComites.index');
    }



    public function subirArchivo(Request $request){
     {
            //Recibimos el archivo y lo guardamos en la carpeta storage/app/public
            $request->file('archivo')->store('public');
            dd("subido y guardado");
     }

    }
}
