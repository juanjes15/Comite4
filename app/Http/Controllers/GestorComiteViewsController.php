<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SolicitudComite;
use App\Models\Aprendiz;
use App\Models\Norma_Infringida;
use App\Models\Prueba;
use App\Models\Articulo;
use App\Models\Capitulo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\comiteMail;



class GestorComiteViewsController extends Controller
{
    public function index()
    {
        // Obtén las solicitudes de comité con paginación y carga la relación 'aprendizs'
        $solicitudComites = SolicitudComite::with('aprendizs')->latest()->paginate();

        $instructors = [];
        $solicitudDates = [];
        $learnersBySolicitud = []; // Arreglo para agrupar aprendices por solicitud de comité

        foreach ($solicitudComites as $solicitud) {
            // Obtener el instructor asociado a la solicitud
            $instructor = $solicitud->instructor;

            // Obtener la fecha de creación de la solicitud
            $fechaCreacion = $solicitud->created_at;

            // Almacenar la información en los arreglos
            $instructors[$solicitud->id] = $instructor;
            $solicitudDates[$solicitud->id] = $fechaCreacion;
        }

        foreach ($solicitudComites as $solicitud) {
            $solicitudId = $solicitud->id;

            // Verificar si existen aprendices relacionados con esta solicitud
            if ($solicitud->aprendizs->isNotEmpty()) {
                $learnersBySolicitud[$solicitudId] = $solicitud->aprendizs;
            } else {
                $learnersBySolicitud[$solicitudId] = [];
            }
        }
        return view('gestorComiteViews.index', compact('solicitudComites', 'instructors'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function detalles($solicitud)
    {
        // Obtén los detalles de la solicitud utilizando el ID proporcionado
        $solicitud = SolicitudComite::find($solicitud);

        // Verifica si la solicitud se encontró
        if (!$solicitud) {
            // Manejo de solicitud no encontrada, por ejemplo, redireccionar o mostrar un mensaje de error.
            return redirect()->route('gestorComiteViews.index'); // Reemplaza 'tu_ruta_de_redireccion' por la ruta apropiada
        }

        // Obtén el ID de la solicitud
        $sol_id = $solicitud->id;

        // Obtén las faltas relacionadas con la solicitud
        $normasInfringidas = Norma_Infringida::where('sol_id', $sol_id)->get();

        // Obtén el ID del aprendiz desde la sesión
        $apr_id = session('apr_id');

        // Obtén los datos del aprendiz
        $aprendiz = Aprendiz::find($apr_id);

        // Obtén los datos de la prueba
        $prueba = Prueba::where('sol_id', $sol_id)->first();

        // Obtén el valor seleccionado en la sesión para capítulo
        $selectedCapId = session('selected_cap_id');
        // Obtén el capítulo relacionado con el $selectedCapId
        $capitulo = Capitulo::find($selectedCapId);

        // Ahora, puedes acceder al campo cap_numero
        $cap_numero = $capitulo ? $capitulo->cap_numero : null;
        $cap_descripcion = $capitulo ? $capitulo->cap_descripcion : null;

        $selectedArtIds = (array)session('selected_art_ids', []); // Cast a array si no hay ninguno, se usará un array vacío
        $articulos = Articulo::whereIn('id', $selectedArtIds)->get();


        // Recupera la solicitud de comité con sus aprendices y numerales relacionados
        $solicitudComite = SolicitudComite::with('aprendizs', 'numerals')->find($sol_id);

        // Ahora, puedes acceder a los aprendices y numerales relacionados
        $aprendices = $solicitudComite ? $solicitudComite->aprendizs : [];
        $numerals = $solicitudComite ? $solicitudComite->numerals : [];

        session()->forget('negar');

        // Elimina la variable de sesión cuando cargues la vista de detalles
        session()->forget('fecha_enviada');

        // Ahora puedes pasar todas estas variables a la vista para mostrar los detalles específicos.
        return view('GestorComiteViews.detalles', compact(
            'solicitud',
            'normasInfringidas',
            'aprendiz',
            'prueba',
            'selectedCapId',
            'cap_numero',
            'cap_descripcion',
            'selectedArtIds',
            'articulos',
            'aprendices',
            'numerals',

        ));
    }

    public function destroy(SolicitudComite $solicitud)
    {
        $solicitud->update(['sol_estado' => 'Negado']);
        session(['negar' => true]);

        return redirect()->route('gestorComiteViews.index');
    }

    public function gFechas(Request $request, $solicitudId)
    {
        // Obtén los detalles de la solicitud utilizando el ID proporcionado
        $solicitud = SolicitudComite::find($solicitudId);

        // Verifica si la solicitud se encontró
        if (!$solicitud) {
            // Manejo de solicitud no encontrada, por ejemplo, redireccionar o mostrar un mensaje de error.
            return redirect()->route('gestorComiteViews.index');
        }

        // Verifica si la solicitud se está aceptando (método POST)
        if ($request->isMethod('post')) {
            // Lógica para manejar la aceptación del comité
            $solicitud->update(['sol_estado' => 'Aceptado']);

            // Limpiar la variable de sesión
            session()->forget('aceptado');

            // Puedes redirigir a donde sea necesario después de realizar la acción
            return redirect()->route('gestorComiteViews.gFechas', ['solicitud' => $solicitudId]);
        }

        // Lógica para la vista en caso de que se acceda a la URL directamente sin POST
        return view('gestorComiteViews.gFechas', compact('solicitud'));
    }


    public function storeSolicitudComiteRequest(Request $request, $solicitudId)
{
    // Obtén los detalles de la solicitud utilizando el ID proporcionado
    $solicitud = SolicitudComite::find($solicitudId);

    // Verifica si la solicitud se encontró
    if (!$solicitud) {
        // Manejo de solicitud no encontrada, por ejemplo, redireccionar o mostrar un mensaje de error.
        return redirect()->route('gestorComiteViews.index');
    }

    // Valida el formulario
    $request->validate([
        'date' => [
            'required',
            'date',
            Rule::unique('solicitud_comites', 'sol_fechaSolicitud')->ignore($solicitudId),
            function ($attribute, $value, $fail) {
                // Verifica que la fecha no sea anterior a la fecha actual
                if (strtotime($value) < strtotime(now())) {
                    $fail('La fecha no puede ser anterior a la fecha actual.');
                }
            },
        ],
    ]);

    // Guarda la fecha en el campo sol_fechaSolicitud de la solicitud
    $solicitud->sol_fechaSolicitud = $request->date;
    $solicitud->save();

    // Envía el correo electrónico independientemente del estado de la solicitud
    $details = [
    'title' => 'Citación a comité',
    'body' => 'Buenas, espero que este mensaje le encuentre bien. Me dirijo a usted para informarle que ha sido citado/a a participar en el próximo comité. La participación y contribución de todos los miembros son fundamentales para el éxito de nuestras actividades.',
    'hora' => '8:00 am', // Agrega la hora según sea necesario
    'lugar' => 'Cad A', // Agrega el lugar según sea necesario
];

    // Aquí puedes manejar el envío del correo
    Mail::to("magonzalez4826@misena.edu.co")->send(new ComiteMail($details));

    // Muestra una alerta con SweetAlert2
    return redirect()->route('gestorComiteViews.index')->with('status', 'success')->with('message', 'Fecha guardada correctamente.');
}



    public function show(SolicitudComite $solicitud)
    {
        // Obtén el ID de la solicitud
        $sol_id = $solicitud->id;
        return view('gestorComiteViews.gFechas', compact('solicitud'));
    }
}