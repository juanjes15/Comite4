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

    public function solicitar3()
    {
        $this->authorize('administrar');

        $sol_id = session('sol_id');
        $aprendizs = Aprendiz::all();

        return view('instructorViews.solicitar3', compact('aprendizs', 'sol_id'));
    }


    public function solicitar4(): View
    {
        $this->authorize('administrar');

        $sol_id = session('sol_id');

        return view('instructorViews.solicitar4', compact('sol_id'));
    }

    public function solicitar5(): View
    {
        $this->authorize('administrar');

        $instructors = Instructor::all();

        return view('instructorViews.solicitar5', compact('instructors'));
    }

    public function storeSolicitar2(StoreSolicitudComiteRequest $request)
    {
        $this->authorize('administrar');

        $solicitud = SolicitudComite::create($request->validated());
        session(['sol_id' => $solicitud->id]);

        return redirect()->route('instructorViews.solicitar3');
    }

    public function storeSolicitar3(StoreSolicitar3Request $request)
    {
        $this->authorize('administrar');
        SolicitudxAprendiz::create($request->validated());
        return redirect()->route('instructorViews.solicitar4');
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
}
