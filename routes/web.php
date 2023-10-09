<?php

use Illuminate\Support\Facades\Route;

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
        'gestorComiteViews' => \App\Http\Controllers\GestorController::class,
    ]);
    Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [\App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/users/addEstudiante/', [\App\Http\Controllers\UserController::class, 'addEstudiante'])->name('users.addEstudiante');
    Route::put('/users/storeEstudiante/{user}', [\App\Http\Controllers\UserController::class, 'storeEstudiante'])->name('users.storeEstudiante');

    Route::get('/users/addInstructor/', [\App\Http\Controllers\UserController::class, 'addInstructor'])->name('users.addInstructor');
    Route::put('/users/storeInstructor/{user}', [\App\Http\Controllers\UserController::class, 'storeInstructor'])->name('users.storeInstructor');

    Route::post('/subir', 'Controller@subirArchivo')->name('subir');
    
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

    Route::get('/InstructorViews/registrar_novedad2/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'registrar_novedad2'])->name('instructorViews.registrar_novedad2');
Route::put('/InstructorViews/registrar_novedad2/{sol_id}', [\App\Http\Controllers\InstructorViewController::class, 'storeRegistrar_novedad2'])->name('instructorViews.storeRegistrar_novedad2');


    
    Route::get('/InstructorViews/solicitarResumen', [\App\Http\Controllers\InstructorViewController::class, 'solicitarResumen'])->name('instructorViews.solicitarResumen');
    Route::get('/instructorViews/plan_MejoramientoP', [\App\Http\Controllers\InstructorViewController::class, 'plan_MejoramientoP'])->name('instructorViews.plan_MejoramientoP');
    Route::get('/instructorViews/plan_Mejoramiento', [\App\Http\Controllers\InstructorViewController::class, 'plan_Mejoramiento'])->name('instructorViews.plan_Mejoramiento');
    Route::get('/instructorViews/registrar_resultado', [\App\Http\Controllers\InstructorViewController::class, 'registrar_resultado'])->name('instructorViews.registrar_resultado');
    Route::get('/instructorViews/anexar_info', [\App\Http\Controllers\InstructorViewController::class, 'anexar_info'])->name('instructorViews.anexar_info');
    Route::get('/instructorViews/consultar_antecedentes', [\App\Http\Controllers\InstructorViewController::class, 'consultar_antecedentes'])->name('instructorViews.consultar_antecedentes');
    Route::get('/instructorViews/detalles_antecedentes', [\App\Http\Controllers\InstructorViewController::class, 'detalles_antecedentes'])->name('instructorViews.detalles_antecedentes');
    Route::get('/instructorViews/consultar_comite', [\App\Http\Controllers\InstructorViewController::class, 'consultar_comite'])->name('instructorViews.consultar_comite');
    Route::get('/instructorViews/detalles_comite', [\App\Http\Controllers\InstructorViewController::class, 'detalles_comite'])->name('instructorViews.detalles_comite');
    //Hasta acá va instructor

    Route::get('/aprendiz/consultas', [\App\Http\Controllers\AprenController::class, 'consultas'])->name('aprendiz_Views.consultas');
    Route::get('/aprendiz/plan_mejoramiento', [\App\Http\Controllers\AprenController::class, 'plan_mejoramiento'])->name('aprendiz_Views.plan_mejoramiento');
    Route::get('/aprendiz/detalles', [\App\Http\Controllers\AprenController::class, 'detalles'])->name('aprendiz_Views.detalles');
    Route::get('/aprendiz/impugnaciones', [\App\Http\Controllers\AprenController::class, 'impugnaciones'])->name('aprendiz_Views.impugnaciones');
    









});
