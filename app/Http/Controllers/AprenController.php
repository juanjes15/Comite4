<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;
use App\Models\Instructor;
use App\Models\Numeral;
use App\Models\Articulo;
use App\Models\Capitulo;


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
    public function reglamento(Request $request)
    {
        $this->authorize('administrar');

        $opcion = $request->input('opcion');
        $termino = $request->input('termino');
        $resultados = [];

        if ($opcion === 'numeral') {
            //búsqueda en la tabla numerals
            $resultados = Numeral::where('num_descripcion', 'LIKE', '%' . $termino . '%')->get();
        } elseif ($opcion === 'articulo') {
            //  búsqueda en la tabla articulos
            $resultados = Articulo::where('art_numero', 'LIKE', '%' . $termino . '%')->get();
        } elseif ($opcion === 'capitulo') {
            // búsqueda en la tabla capitulos
            $resultados = Capitulo::where('cap_numero', 'LIKE', '%' . $termino . '%')->get();
        }

        return view('aprendiz_Views.reglamento', ['resultados' => $resultados]);
    }
}
