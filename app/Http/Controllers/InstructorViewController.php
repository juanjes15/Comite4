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
        $aprendizs = Aprendiz::all();
        $programas = Programa::all();
        $capitulos = Capitulo::all();
        $articulos = Articulo::all();
        $numerals = Numeral::all();


        return view('instructorViews.solicitar2', compact('instructors','aprendizs','programas','capitulos','articulos','numerals'));
    }

    public function storeSolicitar2(StoreSolicitudComiteRequest $request)
    {
        $this->authorize('administrar');

        SolicitudComite::create($request->validated());
        return redirect()->route('instructorViews.solicitar3');
    }
}
