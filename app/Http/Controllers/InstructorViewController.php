<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitar3Request;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudComiteRequest;
use App\Http\Requests\StorePruebaRequest;
use App\Http\Requests\UpdateSolicitudComiteRequest;
use Illuminate\View\View;
use App\Models\Aprendiz;
use App\Models\SolicitudComite;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Capitulo;
use App\Models\Articulo;
use App\Models\Numeral;
use App\Models\Prueba;
use App\Models\SolicitudxAprendiz;
use Illuminate\Support\Facades\Storage;

class InstructorViewController extends Controller
{
    public function solicitar1()
    {
        return view('instructorViews.solicitar1');
    }

    public function solicitar2(): View
    {
        $this->authorize('administrar');

        $instructors = Instructor::all();

        return view('instructorViews.solicitar2', compact('instructors'));
    }

    public function solicitar3(): View
    {
        $this->authorize('administrar');

        $solicitud = session('solicitud');
        $aprendizs = Aprendiz::all();
        $solicitud_comites = SolicitudComite::all();

        return view('instructorViews.solicitar3', compact('aprendizs','solicitud_comites', 'solicitud'));
    }

    public function solicitar4(): View
    {
        $this->authorize('administrar');

        $aprendizs = Aprendiz::all();
        $solicitud_comites = SolicitudComite::all();

        return view('instructorViews.solicitar4', compact('aprendizs','solicitud_comites'));
    }

    public function storeSolicitar2(StoreSolicitudComiteRequest $request)
    {
        $this->authorize('administrar');

        $solicitud = SolicitudComite::create($request->validated());

        return redirect()->route('instructorViews.solicitar3')->with('solicitud', $solicitud);
    }

    public function storeSolicitar3(StoreSolicitar3Request $request)
    {
        $this->authorize('administrar');

        SolicitudxAprendiz::create($request->validated());
        return redirect()->route('instructorViews.solicitar4');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePruebaRequest $request)
    {
        $this->authorize('administrar');
        $img = $request->file('file')->store('');
        $url = Storage::url($img);

        Prueba::create([
            'url'=> $url

        ]);
    }

}
