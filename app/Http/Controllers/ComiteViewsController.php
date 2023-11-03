<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SolicitudComite;
use Illuminate\Support\Facades\Log;
use App\Models\Comite;
use Carbon\Carbon;

class ComiteViewsController extends Controller
{
    public function comite()
    {
        $solicitudes = SolicitudComite::all();

        return view('comite_Views.comite', ['solicitudes' => $solicitudes]);
    }

    public function completar(Request $request)
    {
        try {
            $request->validate([
                'com_codigo' => 'required', 
                'com_recomendacion' => 'required',
                'com_acta' => 'required|file|mimes:pdf',
            ], [
                'com_acta.mimes' => 'El campo Acta debe ser un archivo PDF.',
            ]);

            $codigo = $request->input('com_codigo');

            
            $comite = Comite::where('codigo', $codigo)->first();

            if ($comite) {
                // Si se encuentra un comité con el código, actualiza los campos
                $comite->com_recomendacion = $request->input('com_recomendacion');
                $comite->com_acta = $request->file('com_acta')->store('actas');
                $comite->save();

                return redirect()->route('comite_Views.comite')->with('success', 'los anexos se han insertado correctamente.');
            } else {
                return redirect()->back()->with(['error' => 'Whoops! Por favor intenta más tarde']);
            }
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
