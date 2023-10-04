<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use App\Models\SolicitudxAprendiz;
use Illuminate\Http\Request;

class SolicitudxAprendizController extends Controller
{
    public function consultar_comite(Request $request)
    {
        $identificacion = $request->input('identificacion');
        
        // Buscar el aprendiz por identificación
        $aprendiz = Aprendiz::where('apr_identificacion', $identificacion)->first();

        if ($aprendiz) {
            // Obtener las solicitudes de comité asociadas al aprendiz
            $solicitudes = $aprendiz->solicitudComites;
            
            return view('consultar_comite', ['aprendiz' => $aprendiz, 'solicitudes' => $solicitudes]);
        } else {
            // Aprendiz no encontrado, redirigir o mostrar un mensaje de error
            return redirect()->back()->with('error', 'Aprendiz no encontrado');
        }
    }
}
