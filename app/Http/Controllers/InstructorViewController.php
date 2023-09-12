<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSolicitar3Request;
use App\Http\Requests\StoreSolicitar5Request;
use App\Http\Requests\StoreSolicitarResumenRequest;
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
use App\Models\Norma_Infringida;
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

    public function solicitar2()
    {
        $this->authorize('administrar');

        // Obtener las áreas de los instructores
        $areas = Instructor::distinct()->pluck('ins_area');

        // Obtener los instructores ordenados alfabéticamente por ins_nombres
        $instructors = Instructor::orderBy('ins_area')->get();

        return view('instructorViews.solicitar2', compact('instructors', 'areas'));
    }

    public function solicitar3()
    {
        $this->authorize('administrar');

        $aprendizs = Aprendiz::all();
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');

        return view('instructorViews.solicitar3', compact('aprendizs', 'sol_id'));
    }

    public function solicitar4()
    {
        $this->authorize('administrar');
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');

        return view('instructorViews.solicitar4', compact('sol_id'));
    }

    public function solicitar5()
    {
        $this->authorize('administrar');
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');

        $instructors = Instructor::all();
        $capitulos = Capitulo::all();
        $articulos = Articulo::all();
        $numerals = Numeral::all();

        return view('instructorViews.solicitar5', compact('instructors', 'capitulos', 'articulos', 'numerals', 'sol_id'));
    }

    public function solicitarResumen()
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

        // Combina los datos de las faltas de la base de datos
        $faltas = [];
        foreach ($normasInfringidas as $norma) {
            $faltas[] = [
                'cap_numero' => $norma->cap_numero,
                'cap_descripcion' => $norma->cap_descripcion,
                'art_numero' => $norma->art_numero,
            ];
        }

        //Consulta JJ
        // Recupera la solicitud de comité con sus aprendices relacionados
        $solicitudComite = SolicitudComite::with('aprendizs')->find($sol_id);
        // Ahora, puedes acceder a los aprendices relacionados
        $aprendices = $solicitudComite->aprendizs;


        return view('instructorViews.solicitarResumen', compact(
            'solicitud',
            'aprendiz',
            'prueba',
            'faltas',
            'aprendices'
        ));
    }

    public function storeSolicitar2(Request $request)
    {
        $this->authorize('administrar');

        $solicitud = SolicitudComite::create($request->all());

        // Almacena el ID de solicitud en la sesión
        session(['sol_id' => $solicitud->id]);

        // Almacena el ID de solicitud en una variable local
        $sol_id = $solicitud->id;


        return redirect()->route('instructorViews.solicitar3', compact('sol_id'));
    }


    // En el controlador InstructorViewController
    public function storeSolicitar3(Request $request)
    {
        $this->authorize('administrar');

        // Obtén el ID de solicitud almacenado en la sesión
        $sol_id = session('sol_id');

        // Itera a través de los campos <select> dinámicos
        foreach ($request->all() as $key => $value) {
            // Verifica si el campo comienza con 'nuevo_aprendiz_'
            if (strpos($key, 'nuevo_aprendiz_') === 0) {
                // El campo es un aprendiz seleccionado
                $apr_id = $value;

                // Crea una entrada en la tabla 'solicitudxaprendiz'
                SolicitudxAprendiz::create([
                    'sol_id' => $sol_id,
                    'apr_id' => $apr_id,
                ]);
            }
        }

        return redirect()->route('instructorViews.solicitar4', compact('sol_id'));
    }


    public function storeSolicitar4(Request $request)
    {
        $this->authorize('administrar');

        // Subir y almacenar el archivo
        if ($request->hasFile('pru_url')) {
            $file = $request->file('pru_url');
            $path = $file->store('pruebas'); // Almacena el archivo en la carpeta 'pruebas' dentro del almacenamiento

            // Crea un registro en la tabla 'pruebas'
            Prueba::create([
                'pru_tipo' => $request->pru_tipo,
                'pru_descripcion' => $request->pru_descripcion,
                'pru_fecha' => $request->pru_fecha,
                'pru_url' => $path,
                'sol_id' => session('sol_id'),
            ]);

            return redirect()->route('instructorViews.solicitar5')->with('success', 'La prueba se ha subido exitosamente.');
        }

        return back()->with('error', 'Ocurrió un error al subir la prueba.');
    }

    public function storeSolicitar5(Request $request)
    {
        $this->authorize('administrar');

        $sol_id = session('sol_id');
        $numIds = $request->num_id;
        $cap_ids = $request->cap_id; // Agrega esta línea
        $art_ids = $request->art_id; // Agrega esta línea
        $cap_descripciones = $request->cap_descripcion; // Agrega esta línea

        //     // Agrega dd() para verificar los datos
        // dd($sol_id, $numIds, $cap_ids, $art_ids, $cap_descripciones);


        foreach ($numIds as $key => $numId) {
            $norma_Infringida = Norma_Infringida::create([
                'sol_id' => $sol_id,
                'num_id' => $numId,
                'cap_numero' => isset($cap_ids[$key]) ? $cap_ids[$key] : null,
                'cap_descripcion' => isset($cap_descripciones[$key]) ? $cap_descripciones[$key] : null,
                'art_numero' => isset($art_ids[$key]) ? $art_ids[$key] : null,
            ]);
        }

        // Redirecciona a la vista 'solicitarResumen'
        return redirect()->route('instructorViews.solicitarResumen');
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
        return view('instructorViews.plan_Mejoramiento', compact('aprendizs', 'instructors', 'programas'));
    }
    public function registrar_resultado()
    {
        return view('instructorViews.registrar_resultado');
    }

    public function registrar_novedades()
    {
        $aprendizs = Aprendiz::all();
        $programas = Programa::all();
        return view('instructorViews.registrar_novedades', compact('aprendizs', 'programas'));
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
        return view('instructorViews.detalles_antecedentes');
    }
    public function consultar_comite()
    {
        return view('instructorViews.consultar_comite');
    }
    public function detalles_comite()
    {
        return view('instructorViews.detalles_comite');
    }
}
