<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComiteViewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Route::get('/users', [UserController::class, 'index'])->name('users.index');
    //Route::view('/register', 'auth/register')->name('register');

    //Rutas para el administrador
    Route::middleware('checkUserRole:Administrador,Gestor_Comite')->group(function () {
        Route::resources([
            'programas' => \App\Http\Controllers\ProgramaController::class,
            'fichas' => \App\Http\Controllers\FichaController::class,
            'instructors' => \App\Http\Controllers\InstructorController::class,
            'aprendizs' => \App\Http\Controllers\AprendizController::class,
            'solicitudComites' => \App\Http\Controllers\SolicitudComiteController::class,
            'comites' => \App\Http\Controllers\ComiteController::class,
            'pruebas' => \App\Http\Controllers\PruebaController::class,
            'capitulos' => \App\Http\Controllers\CapituloController::class,
            'articulos' => \App\Http\Controllers\ArticuloController::class,
            'numerals' => \App\Http\Controllers\NumeralController::class,
            'gestorComiteViews' => \App\Http\Controllers\GestorComiteViewsController::class,
        ]);
        Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
        Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
        Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

        Route::get('/users/addRolAprendiz/', [\App\Http\Controllers\UserController::class, 'addRolAprendiz'])->name('users.addRolAprendiz');
        Route::put('/users/storeRolAprendiz/{user}', [\App\Http\Controllers\UserController::class, 'storeRolAprendiz'])->name('users.storeRolAprendiz');

        Route::get('/users/addRolInstructor/', [\App\Http\Controllers\UserController::class, 'addRolInstructor'])->name('users.addRolInstructor');
        Route::put('/users/storeRolInstructor/{user}', [\App\Http\Controllers\UserController::class, 'storeRolInstructor'])->name('users.storeRolInstructor');
    });

    //Rutas para el instructor
    Route::middleware('checkUserRole:Instructor,Administrador,Gestor_Comite')->group(function () {
        //Instructor
        Route::get('/InstructorViews/solicitar1', [\App\Http\Controllers\InstructorViewController::class, 'solicitar1'])->name('instructorViews.solicitar1');
        Route::get('/InstructorViews/solicitar2', [\App\Http\Controllers\InstructorViewController::class, 'solicitar2'])->name('instructorViews.solicitar2');
        Route::get('/obtener-instructores-por-area/{area}', [InstructorController::class, 'getInstructoresPorArea']);
        Route::post('/InstructorViews/solicitar2', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar2'])->name('instructorViews.storeSolicitar2');
        Route::get('/InstructorViews/solicitar3', [\App\Http\Controllers\InstructorViewController::class, 'solicitar3'])->name('instructorViews.solicitar3');
        Route::post('/InstructorViews/solicitar3', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar3'])->name('instructorViews.storeSolicitar3');
        Route::get('/InstructorViews/solicitar4', [\App\Http\Controllers\InstructorViewController::class, 'solicitar4'])->name('instructorViews.solicitar4');
        Route::post('/InstructorViews/solicitar4', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar4'])->name('instructorViews.storeSolicitar4');
        Route::get('/InstructorViews/solicitar5', [\App\Http\Controllers\InstructorViewController::class, 'solicitar5'])->name('instructorViews.solicitar5');
        Route::post('/InstructorViews/solicitar5', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar5'])->name('instructorViews.storeSolicitar5');
        //----------------
        Route::get('/InstructorViews/registrar_novedad2/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'registrar_novedad2'])->name('instructorViews.registrar_novedad2');
        Route::put('/InstructorViews/registrar_novedad2/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'storeRegistrar_novedad2'])->name('instructorViews.storeRegistrar_novedad2');

        Route::get('/InstructorViews/registrar_novedad3/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'registrar_novedad3'])->name('instructorViews.registrar_novedad3');
        Route::put('/InstructorViews/registrar_novedad3/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'storeRegistrar_novedad3'])->name('instructorViews.storeRegistrar_novedad3');

        Route::get('/InstructorViews/registrar_novedad4/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'registrar_novedad4'])->name('instructorViews.registrar_novedad4');
        Route::put('/InstructorViews/registrar_novedad4/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'storeRegistrar_novedad4'])->name('instructorViews.storeRegistrar_novedad4');

        Route::get('/InstructorViews/registrar_novedad5/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'registrar_novedad5'])->name('instructorViews.registrar_novedad5');
        Route::put('/InstructorViews/registrar_novedad5/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'storeRegistrar_novedad5'])->name('instructorViews.storeRegistrar_novedad5');

        Route::match(['get', 'put'], '/instructorViews/detalles_comite/{solicitud}', [\App\Http\Controllers\InstructorViewController::class, 'detalles_comite'])->name('instructorViews.detalles_comite');
        Route::get('/instructorViews/detalles_registrar/{solicitud}', [\App\Http\Controllers\InstructorViewController::class, 'detalles_registrar'])->name('instructorViews.detalles_registrar');

        //------------------

        Route::get('/InstructorViews/solicitarResumen', [\App\Http\Controllers\InstructorViewController::class, 'solicitarResumen'])->name('instructorViews.solicitarResumen');
        Route::get('/instructorViews/plan_MejoramientoP', [\App\Http\Controllers\InstructorViewController::class, 'plan_MejoramientoP'])->name('instructorViews.plan_MejoramientoP');
        Route::get('/instructorViews/plan_Mejoramiento', [\App\Http\Controllers\InstructorViewController::class, 'plan_Mejoramiento'])->name('instructorViews.plan_Mejoramiento');
        Route::get('/instructorViews/registrar_resultado', [\App\Http\Controllers\InstructorViewController::class, 'registrar_resultado'])->name('instructorViews.registrar_resultado');
        Route::get('/instructorViews/consultar_antecedentes', [\App\Http\Controllers\InstructorViewController::class, 'consultar_antecedentes'])->name('instructorViews.consultar_antecedentes');
        Route::get('/instructorViews/detalles_antecedentes', [\App\Http\Controllers\InstructorViewController::class, 'detalles_antecedentes'])->name('instructorViews.detalles_antecedentes');
        Route::get('/instructorViews/consultar_comite', [\App\Http\Controllers\InstructorViewController::class, 'consultar_comite'])->name('instructorViews.consultar_comite');
    });



    Route::post('/subir', 'Controller@subirArchivo')->name('subir');
    //Rutas para el Gestor
    Route::middleware('checkUserRole:Gestor_Comite,Administrador,Aprendiz')->group(function () {
        Route::get('/gestorComiteViews/gFechas', [\App\Http\Controllers\GestorComiteViewsController::class, 'gFechas'])->name('gestorComiteViews.gFechas');
        Route::get('/gestorComiteViews/detalles', [\App\Http\Controllers\GestorComiteViewsController::class, 'detalles'])->name('gestorComiteViews.detalles');
        Route::get('/gestorComiteViews/gFechas/{solicitud}', [\App\Http\Controllers\GestorComiteViewsController::class, 'gFechas'])->name('gestorComiteViews.gFechas');
        Route::post('/gestorComiteViews/gFechas/{solicitud}', [\App\Http\Controllers\GestorComiteViewsController::class, 'gFechas'])->name('gestorComiteViews.gFechas');
        Route::put('/gestorComiteViews/gFechas/{solicitud}', [\App\Http\Controllers\GestorComiteViewsController::class, 'storeSolicitudComiteRequest'])->name('gestorComiteViews.storeSolicitudComiteRequest');
        Route::get('/gestorComiteViews/detalles/{solicitud}', 'App\Http\Controllers\GestorComiteViewsController@detalles')->name('gestorComiteViews.detalles');
        Route::delete('/gestor-comite-views/{solicitud}', 'App\Http\Controllers\GestorComiteViewsController@destroy')->name('gestorComiteViews.destroy');
    });

    //Estas son las rutas de la vista del aprendiz
    Route::middleware('checkUserRole:Aprendiz,Administrador,Gestor_Comite')->group(function () {
        Route::get('/aprendiz/consultas', [\App\Http\Controllers\AprenController::class, 'consultas'])->name('aprendiz_Views.consultas');
        Route::post('/aprendiz/consultas', [\App\Http\Controllers\AprenController::class, 'consultas'])->name('aprendiz_Views.consultas');
        Route::get('/aprendiz/plan_mejoramiento', [\App\Http\Controllers\AprenController::class, 'plan_mejoramiento'])->name('aprendiz_Views.plan_mejoramiento');
        Route::post('/aprendiz/plan_mejoramiento', [\App\Http\Controllers\AprenController::class, 'plan_mejoramiento']); // Sin un nombre de ruta específico para POST
        Route::get('/aprendiz/detalles', [\App\Http\Controllers\AprenController::class, 'detalles'])->name('aprendiz_Views.detalles');
        Route::get('/aprendiz/impugnaciones', [\App\Http\Controllers\AprenController::class, 'impugnaciones'])->name('aprendiz_Views.impugnaciones');
        Route::post('/aprendiz/impugnaciones', [\App\Http\Controllers\AprenController::class, 'impugnaciones'])->name('aprendiz_Views.impugnaciones');
        Route::get('/comite_Views/comite', [\App\Http\Controllers\ComiteViewsController::class, 'comite'])->name('comite_Views.comite');
        Route::post('/comite_Views/completar', [\App\Http\Controllers\ComiteViewsController::class, 'completar'])->name('comite_Views.completar');
        Route::post('/comite_Views/updateEstado', [ComiteViewsController::class, 'updateEstado'])->name('comite_Views.updateEstado');
    });
});
