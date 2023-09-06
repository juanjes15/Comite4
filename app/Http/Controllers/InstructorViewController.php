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

    public function solicitar2(): View
    {
        $this->authorize('administrar');

        // Obtener las áreas de los instructores
        $areas = Instructor::distinct()->pluck('ins_area');

        // Obtener los instructores ordenados alfabéticamente por ins_nombres
        $instructors = Instructor::orderBy('ins_area')->get();

        $ins_nombres = session('ins_nombres');
        $ins_apellidos = session('ins_apellidos');
        $sol_fecha = session('sol_fecha');
        $sol_lugar = session('sol_lugar');
        $sol_asunto = session('sol_asunto');
        $sol_motivo = session('sol_motivo');
        $sol_estado = session('sol_estado');


        return view('instructorViews.solicitar2', compact(
            'instructors',
            'areas',
            'ins_nombres',
            'ins_apellidos',
            'sol_fecha',
            'sol_lugar',
            'sol_asunto',
            'sol_motivo',
            'sol_estado',
        ));
    }


    public function solicitar3()
    {
        $this->authorize('administrar');

        $sol_id = session('sol_id');
        $apr_nombres = session('apr_nombres');
        $apr_apellidos = session('apr_apellidos');
        $aprendizs = Aprendiz::all();


        return view('instructorViews.solicitar3', compact('aprendizs', 'sol_id', 'apr_nombres', 'apr_apellidos'));
    }


    public function solicitar4(): View
    {
        $this->authorize('administrar');

        $sol_id = session('sol_id');
        $ins_nombres = session('ins_nombres');
        return view('instructorViews.solicitar4', compact('sol_id', 'ins_nombres'));
    }

    public function solicitar5(): View
    {
        $this->authorize('administrar');
        $sol_id = session('sol_id');
        $instructors = Instructor::all();
        $capitulos = Capitulo::all();
        $articulos = Articulo::all();
        $numerals = Numeral::all();
        $ins_nombres = session('ins_nombres');

        return view('instructorViews.solicitar5', compact('instructors', 'capitulos', 'articulos', 'numerals', 'sol_id', 'ins_nombres'));
    }

    public function solicitarResumen(): View
    {
        $this->authorize('administrar');

        $sol_id = session('sol_id');
        $apr_id = session('apr_id');
        $solicitud = SolicitudComite::find($sol_id);
        $aprendiz = Aprendiz::find(session('apr_id'));

        // Obtén los datos de la prueba
        $prueba = Prueba::where('sol_id', $sol_id)->first();

        // Obtén los datos del capítulo y artículo
        $cap_numero = session('cap_numero');
        $cap_descripcion = session('cap_descripcion');
        $art_numero = session('art_numero');

        return view('instructorViews.solicitarResumen', compact(
            'solicitud',
            'aprendiz',
            'prueba',
            'cap_numero',
            'cap_descripcion',
            'art_numero'
        ));
    }










    public function storeSolicitar2(StoreSolicitudComiteRequest $request)
    {
        $this->authorize('administrar');

        $solicitud = SolicitudComite::create($request->validated());

        // Redirige a la siguiente vista pasando el ID de la solicitud
        return redirect()->route('instructorViews.solicitar3', ['sol_id' => $solicitud->id]);
    }




    public function storeSolicitar3(StoreSolicitar3Request $request)
    {
        $this->authorize('administrar');

        $solicitudxAprendiz = SolicitudxAprendiz::create($request->validated());

        // Obtén el aprendiz asociado a la solicitud
        $aprendiz = Aprendiz::find(session('apr_id'));

        // Establece las variables de sesión aquí
        session([
            'sol_id' => $solicitudxAprendiz->sol_id, // Asegúrate de que este sea el campo correcto que identifica la solicitud
            'apr_id' => $aprendiz->id, // Asegúrate de almacenar el ID del aprendiz si lo necesitas en la vista
            // Otras variables de sesión si es necesario
        ]);

        // Redirige a la vista 'solicitarResumen'
        return redirect()->route('instructorViews.solicitarResumen');
    }







    public function storeSolicitar4(StorePruebaRequest $request)
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
                'sol_id' => $request->sol_id,
            ]);

            return redirect()->route('instructorViews.solicitar5')->with('success', 'La prueba se ha subido exitosamente.');
        }

        return back()->with('error', 'Ocurrió un error al subir la prueba.');
    }

    public function storeSolicitar5(StoreSolicitar5Request $request)
    {
        $this->authorize('administrar');

        $sol_id = $request->sol_id;
        $numIds = $request->num_id;

        foreach ($numIds as $numId) {
            Norma_Infringida::create([
                'sol_id' => $sol_id,
                'num_id' => $numId,
            ]);
        }

        return redirect()->route('instructorViews.solicitarResumen');
    }
}
