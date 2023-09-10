<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;
use App\Models\Instructor;

class AprenController extends Controller
{
    public function consultas()
    {
        $this->authorize('administrar');
        $comites = Comite::all();
        return view('aprendiz_Views.consultas', ['comites' => $comites]);
    }

    public function plan_mejoramiento()
    {
        $this->authorize('administrar');
        return view('aprendiz_Views.plan_mejoramiento');
    }

    public function detalles(Request $request)
    {
        $instructors = Instructor::all();
        return view('aprendiz_Views.detalles', ['instructors' => $instructors]);
    }
    public function impugnaciones()
    {
        $this->authorize('administrar');
        return view('aprendiz_Views.impugnaciones');
    }
    public function reglamento()
    {
        $this->authorize('administrar');
        return view('aprendiz_Views.reglamento');
    }
}
