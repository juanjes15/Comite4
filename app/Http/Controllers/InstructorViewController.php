<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanMejoramiento;
use App\Http\Requests\StorePruebaRequest;
use App\Http\Requests\StoreSolicitudComiteRequest;
use Illuminate\Http\Request;
use App\Models\Aprendiz;
use App\Models\SolicitudComite;
use App\Models\Instructor;
use App\Models\Programa;
use App\Models\Capitulo;
use App\Models\Articulo;
use App\Models\Norma_Infringida;
use App\Models\Numeral;
use App\Models\Prueba;
use App\Models\PlanMejoramiento;
use App\Models\SolicitudxAprendiz;
use Illuminate\Support\Str;
use Carbon\Carbon;

class InstructorViewController extends Controller
{
    public function solicitar1()
    {
        return view('instructorViews.solicitar1');
    }

    public function solicitar2()
    {
        

        // Obtener las áreas de los instructores
        $areas = Instructor::distinct()->pluck('ins_area');

        // Obtener los instructores ordenados alfabéticamente por ins_nombres
        $instructors = Instructor::orderBy('ins_area')->get();

        return view('instructorViews.solicitar2', compact('instructors', 'areas'));
    }

    public function solicitar3()
    {
       

        $aprendizs = Aprendiz::all();
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');

        return view('instructorViews.solicitar3', compact('aprendizs', 'sol_id'));
    }

    public function solicitar4()
    {
     
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');

        return view('instructorViews.solicitar4', compact('sol_id'));
    }

    public function solicitar5()
    {
        
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

        // Obtén el valor seleccionado en la sesión para capítulo
        $selectedCapId = session('selected_cap_id');
        // Obtén el capítulo relacionado con el $selectedCapId
        $capitulo = Capitulo::find($selectedCapId);

        // Ahora, puedes acceder al campo cap_numero
        $cap_numero = $capitulo->cap_numero;
        $cap_descripcion = $capitulo->cap_descripcion;

        // Obtén los valores seleccionados en la sesión para artículos
        $selectedArtIds = session('selected_art_ids', []); // Obtener los valores, si no hay ninguno, se usará un array vacío
        // Obtén los artículos relacionados con los $selectedArtIds
        $articulos = Articulo::where('id', $selectedArtIds)->get();

        //Consulta JJ
        // Recupera la solicitud de comité con sus aprendices relacionados
        $solicitudComite = SolicitudComite::with('aprendizs', 'numerals')->find($sol_id);
        // Ahora, puedes acceder a los aprendices relacionados
        $aprendices = $solicitudComite->aprendizs;
        $normaxd = $solicitudComite->numerals;


        // Obtén los IDs de numerales almacenados en la sesión
        $selectedNumIds = session('selected_num_ids', []);
        // Filtra los numerales por los IDs almacenados en la sesión
        $numerals = Numeral::whereIn('id', $selectedNumIds)->get();





        return view('instructorViews.solicitarResumen', compact(
            'solicitud',
            'aprendiz',
            'prueba',
            'aprendices',
            'selectedCapId',
            'cap_numero',
            'selectedArtIds',
            'articulos',
            'cap_descripcion',
            'numerals',
            'normaxd'
        ));
    }


    public function storeSolicitar2(StoreSolicitudComiteRequest $request)
    {

        // Asegúrate de que 'sol_fechaSolicitud' esté presente en los datos antes de asignarlo
        $data = $request->all();
        $data['sol_fechaSolicitud'] = $request->input('sol_fechaSolicitud', null);

        $solicitud = SolicitudComite::create($request->validated());

        // Almacena el ID de solicitud en la sesión
        session(['sol_id' => $solicitud->id]);

        // Almacena el ID de solicitud en una variable local
        $sol_id = $solicitud->id;

        return redirect()->route('instructorViews.solicitar3', compact('sol_id'));
    }



    // En el controlador InstructorViewController
    public function storeSolicitar3(Request $request)
    {

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


    public function storeSolicitar4(StorePruebaRequest $request)
    {
        $datosValidados = $request->validated();

        // Subir y almacenar el archivo
        if ($request->hasFile('pru_url')) {
            $file = $request->file('pru_url');
            $path = $file->store('pruebas'); // Almacena el archivo en la carpeta 'pruebas' dentro del almacenamiento
            $datosValidados['pru_url'] = $path;
            $datosValidados['sol_id'] = session('sol_id');
            // Crea un registro en la tabla 'pruebas'
            Prueba::create($datosValidados);

            return redirect()->route('instructorViews.solicitar5')->with('success', 'La prueba se ha subido exitosamente.');
        }

        return back()->with('error', 'Ocurrió un error al subir la prueba.');
    }

    public function storeSolicitar5(Request $request)
    {
       
        $sol_id = session('sol_id');

        // Obtén los valores seleccionados en el formulario
        $selectedCapId = $request->input('cap_id');
        $selectedArtIds = $request->input('art_id', []);
        $selectedNumIds = $request->input('num_id', []);

        // Almacenar los valores seleccionados en la sesión
        session([
            'selected_cap_id' => $selectedCapId,
            'selected_art_ids' => $selectedArtIds,
            'selected_num_ids' => $selectedNumIds,
        ]);



        // Verificar si se han seleccionado descripciones
        if (!empty($selectedNumIds) && !empty($selectedArtIds)) {
            // Convertir $selectedNumIds y $selectedArtIds en arrays si no lo son
            $selectedNumIds = is_array($selectedNumIds) ? $selectedNumIds : [$selectedNumIds];
            $selectedArtIds = is_array($selectedArtIds) ? $selectedArtIds : [$selectedArtIds];

            // Iterar sobre los valores seleccionados y crear un registro para cada combinación
            foreach ($selectedNumIds as $numId) {
                foreach ($selectedArtIds as $artId) {
                    Norma_Infringida::create([
                        'sol_id' => $sol_id,
                        'num_id' => $numId,
                        'art_id' => $artId
                    ]);
                }
            }
        }


        // Redirecciona a la vista 'solicitarResumen'
        return redirect()->route('instructorViews.solicitarResumen');
    }

    public function plan_MejoramientoP(StorePlanMejoramiento $request)
    {
        $sol_id = $request->input('sol_id');
        $solicitud = SolicitudComite::findOrFail($sol_id);
    
        // Almacena el ID de solicitud en la sesión
        session(['sol_id' => $solicitud->id]);
    
        // Crea un nuevo objeto PlanMejoramiento con los datos validados del formulario
        $planMejoramiento = PlanMejoramiento::create($request->validated());
    
        // Guarda el objeto en la base de datos
        $planMejoramiento->save();
    
        $instructors = Instructor::all();
    
        return view('instructorViews.plan_MejoramientoP', compact('instructors', 'sol_id', 'solicitud'));
    }
    
    // public function plan_MejoramientoP(StorePlanMejoramiento $request)
    // {
    //     $instructors = Instructor::all();

    //     $sol_id = $request->input('sol_id');
    //     $solicitud = SolicitudComite::findOrFail($sol_id);

    //     // Almacena el ID de solicitud en la sesión
    //     session(['sol_id' => $solicitud->id]);

    //     $planMejoramiento = PlanMejoramiento::create($request->validated());
    //     // // Validación de datos
    //     // $request->validate([
    //     //     'email' => 'required|email',
    //     //     'descripcion' => 'required',
    //     //     'url_documento' => 'required|file',
    //     //     'Area' => 'required',
    //     //     'Fecha_inicial' => 'required|date',
    //     //     'Fecha_final' => 'required|date',
    //     //     'Instructor_responsable' => 'required',
    //     //     'Objetivo_del_plan' => 'required',
    //     //     'Indicadores_de_desempeno' => 'required',
    //     // ]);

    //     // // Crear un nuevo objeto PlanMejoramiento con los datos del formulario
    //     // $planMejoramiento = new PlanMejoramiento([
    //     //     'email' => $request->input('email'),
    //     //     'descripcion' => $request->input('descripcion'),
    //     //     'url_documento' => $request->file('url_documento')->store('documentos'), // Almacena el archivo en la carpeta 'documentos'
    //     //     'Area' => $request->input('Area'),
    //     //     'Fecha_inicial' => $request->input('Fecha_inicial'),
    //     //     'Fecha_final' => $request->input('Fecha_final'),
    //     //     'Instructor_responsable' => $request->input('Instructor_responsable'),
    //     //     'Objetivo_del_plan' => $request->input('Objetivo_del_plan'),
    //     //     'Indicadores_de_desempeno' => $request->input('Indicadores_de_desempeno'),
    //     // ]);

    //     //Guardar el objeto en la base de datos
    //     $planMejoramiento->save();

    //     return view('instructorViews.plan_MejoramientoP', compact('instructors', 'sol_id','solicitud'));
    // }
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

    public function consultar_antecedentes()
    {
        return view('instructorViews.consultar_antecedentes');
    }

    public function detalles_antecedentes()
    {
        //$instructors = Instructor::all();
        return view('instructorViews.detalles_antecedentes');
    }

    public function detalles_comite($solicitud)
    {
       

        // Obtén los detalles de la solicitud utilizando el ID proporcionado
        $solicitud = SolicitudComite::find($solicitud);

        // Verifica si la solicitud se encontró
        if (!$solicitud) {
            // Manejo de solicitud no encontrada, por ejemplo, redireccionar o mostrar un mensaje de error.
            return redirect()->route('tu_ruta_de_redireccion'); // Reemplaza 'tu_ruta_de_redireccion' por la ruta apropiada
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

        // Ahora puedes pasar todas estas variables a la vista para mostrar los detalles específicos.
        return view('instructorViews.detalles_comite', compact(
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
            'numerals'
        ));
    }



    public function consultar_comite(Request $request)
    {
        // Obtén las solicitudes de comité con paginación y carga la relación 'aprendizs'
        $solicitudComites = SolicitudComite::with('aprendizs')->latest()->paginate(5);

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

        return view('instructorViews.consultar_comite', compact('solicitudComites', 'instructors', 'solicitudDates', 'learnersBySolicitud'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //Registrar Novedades

    public function registrar_novedad2($sol_id)
    {
       
        // Obtener las áreas de los instructores
        $areas = Instructor::distinct()->pluck('ins_area');

        // Obtener los instructores ordenados alfabéticamente por ins_nombres
        $instructors = Instructor::orderBy('ins_area')->get();

        $solicitud = SolicitudComite::findOrFail($sol_id);

        return view('instructorViews.registrar_novedad2', compact('instructors', 'areas', 'solicitud', 'sol_id'));
    }



    public function storeRegistrar_novedad2(Request $request)
    {
       
        // Obtener la solicitud existente por su ID
        $sol_id = $request->input('sol_id');
        $solicitud = SolicitudComite::findOrFail($sol_id);

        // Actualizar los campos de la solicitud con los datos del formulario
        $solicitud->update($request->all());

        // Almacena el ID de solicitud en la sesión
        session(['sol_id' => $solicitud->id]);

        // Almacena el ID de solicitud en una variable local
        $sol_id = $solicitud->id;

        return redirect()->route('instructorViews.registrar_novedad3', compact('sol_id'));
    }



    public function registrar_novedad3($sol_id)
    {
        $aprendizs = Aprendiz::all();
        $solicitud = SolicitudComite::findOrFail($sol_id);

        return view('instructorViews.registrar_novedad3', compact('aprendizs', 'solicitud', 'sol_id'));
    }

    public function storeRegistrar_novedad3(Request $request)
    {

        // Obtén el ID de solicitud almacenado en la sesión
        $sol_id = session('sol_id');
        $solicitud = SolicitudxAprendiz::findOrFail($sol_id);

        // Itera sobre los datos del formulario para actualizar los aprendices relacionados
        foreach ($request->all() as $key => $value) {
            if (Str::startsWith($key, 'apr_id_')) {
                // Extrae el ID del aprendiz del nombre del campo
                $aprendizId = substr($key, strlen('apr_id_'));

                // Actualiza el aprendiz relacionado con el ID obtenido del campo
                $solicitud->aprendizs()->updateExistingPivot($aprendizId, ['apr_id' => $value]);
            }
        }

        // Actualizar los campos de la solicitud con los datos del formulario
        // $solicitud->update($request->all());

        // Almacena el ID de solicitud en la sesión
        session(['sol_id' => $solicitud->id]);


        // Redirige al siguiente paso del formulario
        return redirect()->route('instructorViews.registrar_novedad4', compact('sol_id'));
    }


    public function registrar_novedad4()
    {
    
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');
        // Obtén la solicitud y sus pruebas asociadas
        $solicitud = SolicitudComite::with('pruebas')->where('id', $sol_id)->first();
        //sirve para obtener datos y mostrarlos
        $prueba = Prueba::where('sol_id', $sol_id)->first();
        $prueba->pru_fecha = Carbon::parse($prueba->pru_fecha)->format('Y-m-d');

        return view('instructorViews.registrar_novedad4', compact('sol_id', 'solicitud', 'prueba'));
    }

    public function storeRegistrar_novedad4(Request $request)
    {
        

        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');

        // Busca el registro existente en la tabla 'pruebas' por 'sol_id'
        $prueba = Prueba::where('sol_id', $sol_id)->first();

        // Subir y almacenar el archivo
        if ($request->hasFile('pru_url')) {
            $file = $request->file('pru_url');
            $path = $file->store('pruebas'); // Almacena el archivo en la carpeta 'pruebas' dentro del almacenamiento

            // Actualiza el registro en la tabla 'pruebas'
            $prueba->update([
                'pru_tipo' => $request->pru_tipo,
                'pru_descripcion' => $request->pru_descripcion,
                'pru_fecha' => $request->pru_fecha,
                'pru_url' => $path,
            ]);

            return redirect()->route('instructorViews.registrar_novedad5', ['sol_id' => $sol_id])->with('success', 'La prueba se ha subido exitosamente.');
        }

        return back()->with('error', 'Ocurrió un error al subir la prueba.');
    }

    public function registrar_novedad5()
    {
        
        // Accede al valor de 'sol_id' almacenado en la sesión
        $sol_id = session('sol_id');
        $solicitud = SolicitudComite::findOrFail($sol_id);

        $instructors = Instructor::all();
        $capitulos = Capitulo::all();
        $articulos = Articulo::all();
        $numerals = Numeral::all();

        return view('instructorViews.registrar_novedad5', compact('instructors', 'capitulos', 'articulos', 'numerals', 'sol_id'));
    }



    public function storeRegistrar_novedad5(Request $request, $solicitudId)
    {
        

        $sol_id = session('sol_id');

        // Obtén los valores seleccionados en el formulario
        $selectedCapId = $request->input('cap_id');
        $selectedArtIds = $request->input('art_id');
        $selectedNumIds = (array) $request->input('num_id', []); // Convertir a array

        // Almacena los valores seleccionados en la sesión
        session([
            'selected_cap_id' => $selectedCapId,
            'selected_art_ids' => $selectedArtIds,
            'selected_num_ids' => $selectedNumIds,
        ]);

        // Verifica si se han seleccionado descripciones
        if (!empty($selectedNumIds) && !empty($selectedArtIds)) {
            // Obtén todas las combinaciones de numerales y artículos
            $combinaciones = collect($selectedNumIds)->crossJoin([$selectedArtIds]);

            // Itera sobre las combinaciones de numerales y artículos
            foreach ($combinaciones as $combinacion) {
                [$numId, $artId] = $combinacion;

                // Encuentra el registro en la tabla 'norma_infringida'
                try {
                    $normaInfringida = Norma_Infringida::where([
                        'sol_id' => $sol_id,
                        'num_id' => $numId,
                        'art_id' => $artId
                    ])->first();
                    if (!$normaInfringida) {
                        throw new \Exception("No se encontró un registro para sol_id: $sol_id, num_id: $numId, art_id: $artId");
                    }

                    // Actualiza el registro con los nuevos valores
                    $normaInfringida->update([
                        'sol_id' => $sol_id,
                        'num_id' => $numId,
                        'art_id' => $artId
                        // Agrega aquí otros campos que desees actualizar
                    ]);
                } catch (\Exception $e) {
                    // Manejar la excepción
                    // dd($e->getMessage());
                }
            }

            // Redirecciona a la vista 'detalles_comite'
            return redirect()->route('instructorViews.detalles_registrar', ['solicitud' => $solicitudId]);
        }
        

        // Agrega un manejo para el caso en que no se seleccionen descripciones
        return back()->with('error', 'Debes seleccionar al menos una descripción y un artículo.');
    }

    public function detalles_registrar($solicitud)
    {
        

        // Obtén los detalles de la solicitud utilizando el ID proporcionado
        $solicitud = SolicitudComite::find($solicitud);

        // Verifica si la solicitud se encontró
        if (!$solicitud) {
            // Manejo de solicitud no encontrada, por ejemplo, redireccionar o mostrar un mensaje de error.
            return redirect()->route('tu_ruta_de_redireccion'); // Reemplaza 'tu_ruta_de_redireccion' por la ruta apropiada
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

        $selectedNumIds = (array)session('selected_num_ids', []);
        $numeral = Numeral::WhereIn('id', $selectedNumIds)->get();

        // Recupera la solicitud de comité con sus aprendices y numerales relacionados
        $solicitudComite = SolicitudComite::with('aprendizs', 'numerals')->find($sol_id);

        // Ahora, puedes acceder a los aprendices y numerales relacionados
        $aprendices = $solicitudComite ? $solicitudComite->aprendizs : [];
        $numerals = $solicitudComite ? $solicitudComite->numerals : [];
        
        // Ahora puedes pasar todas estas variables a la vista para mostrar los detalles específicos.
        return view('instructorViews.detalles_registrar', compact(
            'solicitud',
            'normasInfringidas',
            'aprendiz',
            'prueba',
            'selectedCapId',
            'cap_numero',
            'cap_descripcion',
            'selectedArtIds',
            'selectedNumIds',
            'numeral',
            'articulos',
            'aprendices',
            'numerals'
        ));
    }
}
