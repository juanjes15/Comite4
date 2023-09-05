<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreSolicitudComiteRequest;
use App\Http\Requests\UpdateSolicitudComiteRequest;
use Illuminate\View\View;
use App\Models\Aprendiz;
use App\Models\SolicitudComite;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Capitulo;
use App\Models\Articulo;
use App\Models\Numeral;

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

    public function storeSolicitar2(StoreSolicitudComiteRequest $request)
    {
        $this->authorize('administrar');

        SolicitudComite::create($request->validated());
        return redirect()->route('instructorViews.solicitar3');
    }
   
    public function plan_MejoramientoP()
    {
        return view('instructorViews.plan_MejoramientoP');
    }
    public function plan_Mejoramiento()
    {
        $instructors = Instructor::all();
        $aprendizs = Aprendiz::all();
        $programas = Programa::all();
        return view('instructorViews.plan_Mejoramiento', compact('aprendizs','instructors','programas'));
    }
    public function registrar_resultado()
    {
        return view ('instructorViews.registrar_resultado');
    }

    public function registrar_novedades()
    {
        $aprendizs = Aprendiz::all();
        $programas = Programa::all();
        return view('instructorViews.registrar_novedades', compact('aprendizs','programas'));
    }

    public function anexar_info()
    {
        return view('instructorViews.anexar_info');
    }

    public function consultar_antecedentes()
    {
        return view('instructorViews.consultar_antecedentes');
    }

    public function detalles_antecedentes()
    {
        //$instructors = Instructor::all();
        return view ('instructorViews.detalles_antecedentes');
    }
    public function consultar_comite()
    {
        return view('instructorViews.consultar_comite');
    }
    public function detalles_comite()
    {
        return view ('instructorViews.detalles_comite');
    }
}
