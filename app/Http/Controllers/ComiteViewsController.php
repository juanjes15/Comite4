<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ComiteViewsController extends Controller
{
    public function comite()
    {
        $comites = Comite::all();

        return view('comite_Views.comite', ['comites' => $comites]);
    }

    public function updateEstado(Request $request)
{
    $request->validate([
        'id' => 'required|exists:comites,id',
        'estado' => 'required|in:Terminado,Aplazado',
        'codigo' => 'required|exists:comites,codigo',
    ]);

    $comite = Comite::where('codigo', $request->codigo)->first();
    $comite->com_estado = $request->estado;
    $comite->save();

    return response()->json(['success' => true]);
}
    public function completar(Request $request)
    {
        try {
            // Obtener datos del formulario
            $codigo = $request->input('com_codigo');
            $acta = $request->file('com_acta');
            $recomendacion = $request->input('com_recomendacion');

            // Verificar si ya existe un registro con el código dado
            $comiteExistente = Comite::where('codigo', $codigo)->first();

            if ($comiteExistente) {
                // Si existe, actualizar el registro existente
                $comiteExistente->update([
                    'com_acta' => $acta->store('actas', 'public'), // Almacena el acta en la carpeta 'actas' del disco 'public'
                    'com_recomendacion' => $recomendacion,
                    // Otros campos que puedas necesitar actualizar
                ]);
            } else {
                // Si no existe, crear un nuevo registro
                Comite::create([
                    'codigo' => $codigo,
                    'com_acta' => $acta->store('actas', 'public'), // Almacena el acta en la carpeta 'actas' del disco 'public'
                    'com_recomendacion' => $recomendacion,
                    // Otros campos que puedas necesitar insertar
                ]);
            }
            return redirect()->route('aprendiz_Views.consultas')->with('status', 'success')->with('message', 'El registro se ha realizado con exito.');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al completar el registro']);
        }
    }
}
