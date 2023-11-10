<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;
use App\Models\Instructor;
use App\Models\SolicitudComite;
use App\Models\Numeral;
use App\Models\Articulo;
use App\Models\Capitulo;
use App\Models\Prueba;
use App\Models\PlanMejoramiento;
use App\Models\Aprendiz;
use App\Notifications\planMejoramientoNoti;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Exception; 






class AprenController extends Controller
{
    public function consultas(Request $request)
    {
        $this->authorize('administrar');
    
        if ($request->isMethod('post')) {
            // Validar los datos del formulario
            $request->validate([
                'pru_descripcion' => 'required|string',
                'pru_url' => 'required|file|mimes:jpeg,png,gif', 
            ]);
    
            
            $prueba = new Prueba();
            $prueba->sol_id = 1; 
            $prueba->pru_tipo = 'Tipo deseado'; 
            $prueba->pru_descripcion = $request->input('pru_descripcion');
            $prueba->pru_fecha = now(); 
            $prueba->pru_url = $request->file('pru_url')->store('pruebas'); 
    
            
            $prueba->save();
    
            // Redirigir a la vista de consultas con un mensaje de éxito
            return redirect()->route('aprendiz_Views.consultas')->with('status', 'success')->with('message', 'Las pruebas se han anexado correctamente.');
        }
    
        $comites = Comite::all();
        return view('aprendiz_Views.consultas', ['comites' => $comites]);
    }
    
    public function plan_mejoramiento(Request $request)
    {
        $this->authorize('administrar');
    
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'email' => 'required|email',
                'descripcion' => 'required|string',
                'url_documento' => 'required|file|mimes:jpeg,png,gif',
            ]);
    
            
            $planMejoramiento = PlanMejoramiento::first();
    
            if ($planMejoramiento) {
                $planMejoramiento->email = $request->input('email');
                $planMejoramiento->descripcion = $request->input('descripcion');
                $planMejoramiento->url_documento = $request->file('url_documento')->store('plan_mejoramiento');
                $planMejoramiento->save();
            } else {
                
                $planMejoramiento = new PlanMejoramiento();
                $planMejoramiento->email = $request->input('email');
                $planMejoramiento->descripcion = $request->input('descripcion');
                $planMejoramiento->url_documento = $request->file('url_documento')->store('plan_mejoramiento');
                $planMejoramiento->save();
            }
    
            try {
                Notification::route('mail', 'maleja20172017@gmail.com')->notify(new planMejoramientoNoti($data));
            } catch (Exception $exception) {
                Log::error('Error en el controlador: ' . $exception->getMessage());
                return redirect()->back()->with(['error' => 'Whoops! Por favor intenta más tarde']);
            }
    
            return redirect()->back()->with(['success' => '¡Gracias!']);
        }
    
     
        $planMejoramiento = PlanMejoramiento::first();
    
       
        return view('aprendiz_Views.plan_mejoramiento', compact('planMejoramiento'));
    }
    
    public function detalles(Request $request)
{
    $solicitud = SolicitudComite::find(1); 
    $instructor = Instructor::find($solicitud->ins_id);

    return view('aprendiz_Views.detalles', compact('solicitud', 'instructor'));
}








    public function impugnaciones(Request $request)
    {
        $this->authorize('administrar');
    
        if ($request->isMethod('post')) {
            
            $request->validate([
                'apr_identificacion' => 'required|string',
                'apr_motivoImpugnacion' => 'required|string',
                'apr_fechaImpugnacion' => 'required|date',
                'apr_pruImpugnacion' => 'required|file|mimes:jpeg,png,gif',
            ]);
    
            
            $aprendizExistente = Aprendiz::where('apr_identificacion', $request->input('apr_identificacion'))->first();
    
            if (!$aprendizExistente) {
                
                return redirect()->back()->with('error', 'No se encontró ningún aprendiz con la identificación proporcionada.');
            }
    
            // Actualiza los datos de impugnación
            $aprendizExistente->apr_motivoImpugnacion = $request->input('apr_motivoImpugnacion');
            $aprendizExistente->apr_fechaImpugnacion = $request->input('apr_fechaImpugnacion');
            $aprendizExistente->apr_pruImpugnacion = $request->file('apr_pruImpugnacion')->store('aprendizs');
    
            // Guardar la instancia en la base de datos
            $aprendizExistente->save();
    
            // Redirigir a la vista de consultas con un mensaje de éxito
            return redirect()->route('aprendiz_Views.consultas')->with('status', 'success')->with('message', 'Las pruebas se han anexado correctamente.');
        }

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