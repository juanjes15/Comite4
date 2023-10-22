<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comite;
use App\Models\Instructor;
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
                'pru_url' => 'required|file|mimes:jpeg,png,gif', // Puedes ajustar las reglas de validación según tus necesidades
            ]);
    
            // Crear una nueva instancia del modelo Prueba y asignar los valores
            $prueba = new Prueba();
            $prueba->sol_id = 1; // Asigna el valor adecuado para sol_id
            $prueba->pru_tipo = 'Tipo deseado'; // Puedes ajustar el valor según tus necesidades
            $prueba->pru_descripcion = $request->input('pru_descripcion');
            $prueba->pru_fecha = now(); // Puedes ajustar la fecha según tus necesidades
            $prueba->pru_url = $request->file('pru_url')->store('pruebas'); // Guardar el archivo en una ubicación deseada
    
            // Guardar la instancia en la base de datos
            $prueba->save();
    
            // Redirigir a la vista de consultas con un mensaje de éxito
            return redirect()->route('aprendiz_Views.consultas')->with('success', 'La prueba se ha guardado correctamente.');
        }
    
        $comites = Comite::all();
        return view('aprendiz_Views.consultas', ['comites' => $comites]);
    }
    
    public function plan_mejoramiento(Request $request)
    {
        $this->authorize('administrar');
    
        if ($request->isMethod('post')) {
            // Validar los datos del formulario
            $data = $request->validate([
                'email' => 'required|email',
                'descripcion' => 'required|string',
                'url_documento' => 'required|file|mimes:jpeg,png,gif',
            ]);
    
            // Crear una nueva instancia del modelo PlanMejoramiento y asignar los valores
            $plan_mejoramiento = new PlanMejoramiento();
            $plan_mejoramiento->email = $request->input('email');
            $plan_mejoramiento->descripcion = $request->input('descripcion');
            $plan_mejoramiento->url_documento = $request->file('url_documento')->store('plan_mejoramiento');
    
            // Guardar la instancia en la base de datos
            $plan_mejoramiento->save();
    
            // Enviar notificación por correo
            try {
                Notification::route('mail', 'maleja20172017@gmail.com')->notify(new planMejoramientoNoti($data));
            } catch (Exception $exception) {
                Log::error('Error en el controlador: ' . $exception->getMessage());
                return redirect()->back()->with(['error' => 'Whoops! Por favor intenta más tarde']);
            }
    
            return redirect()->back()->with(['success' => '¡Gracias!']);
        }
    
    
        // Si es una solicitud GET, simplemente muestra la vista
        $this->authorize('administrar');
        return view('aprendiz_Views.plan_mejoramiento');
    }

    public function detalles(Request $request)
    {
        $instructors = Instructor::all();
        return view('aprendiz_Views.detalles', ['instructors' => $instructors]);
    }







    public function impugnaciones(Request $request)
    {
        $this->authorize('administrar');
    
        if ($request->isMethod('post')) {
            // Validar los datos del formulario
            $request->validate([
                'apr_identificacion' => 'required|string',
                'apr_motivoImpugnacion' => 'required|string',
                'apr_fechaImpugnacion' => 'required|date',
                'apr_pruImpugnacion' => 'required|file|mimes:jpeg,png,gif',
            ]);
    
            // Verificar si existe un registro con la identificación proporcionada
            $aprendizExistente = Aprendiz::where('apr_identificacion', $request->input('apr_identificacion'))->first();
    
            if (!$aprendizExistente) {
                // Si no existe, muestra un mensaje de error al usuario
                return redirect()->back()->with('error', 'No se encontró ningún aprendiz con la identificación proporcionada.');
            }
    
            // Actualiza los datos de impugnación
            $aprendizExistente->apr_motivoImpugnacion = $request->input('apr_motivoImpugnacion');
            $aprendizExistente->apr_fechaImpugnacion = $request->input('apr_fechaImpugnacion');
            $aprendizExistente->apr_pruImpugnacion = $request->file('apr_pruImpugnacion')->store('aprendizs');
    
            // Guardar la instancia en la base de datos
            $aprendizExistente->save();
    
            // Redirigir a la vista de consultas con un mensaje de éxito
            return redirect()->back()->with('success', 'La impugnación ha sido enviada con éxito.');
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