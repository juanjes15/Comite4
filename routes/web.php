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
        'users' => \App\Http\Controllers\UserController::class,
        'gestorComiteViews' => \App\Http\Controllers\GestorController::class,


    ]);
    Route::post('/subir', 'Controller@subirArchivo')->name('subir');
    Route::get('/InstructorViews/solicitar1', [\App\Http\Controllers\InstructorViewController::class, 'solicitar1'])->name('instructorViews.solicitar1');
    Route::get('/InstructorViews/solicitar2', [\App\Http\Controllers\InstructorViewController::class, 'solicitar2'])->name('instructorViews.solicitar2');
    Route::post('/InstructorViews/solicitar2', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar2'])->name('instructorViews.storeSolicitar2');
    Route::get('/instructorViews/plan_MejoramientoP', [\App\Http\Controllers\InstructorViewController::class, 'plan_MejoramientoP'])->name('instructorViews.plan_MejoramientoP');
    Route::get('/instructorViews/plan_Mejoramiento', [\App\Http\Controllers\InstructorViewController::class, 'plan_Mejoramiento'])->name('instructorViews.plan_Mejoramiento');
    Route::get('/instructorViews/registrar_resultado', [\App\Http\Controllers\InstructorViewController::class, 'registrar_resultado'])->name('instructorViews.registrar_resultado');
    Route::get('/instructorViews/registrar_novedades', [\App\Http\Controllers\InstructorViewController::class, 'registrar_novedades'])->name('instructorViews.registrar_novedades');
    Route::get('/instructorViews/anexar_info', [\App\Http\Controllers\InstructorViewController::class, 'anexar_info'])->name('instructorViews.anexar_info');
    Route::get('/instructorViews/consultar_antecedentes', [\App\Http\Controllers\InstructorViewController::class, 'consultar_antecedentes'])->name('instructorViews.consultar_antecedentes');
    Route::get('/instructorViews/detalles_antecedentes', [\App\Http\Controllers\InstructorViewController::class, 'detalles_antecedentes'])->name('instructorViews.detalles_antecedentes');
    Route::get('/instructorViews/consultar_comite', [\App\Http\Controllers\InstructorViewController::class, 'consultar_comite'])->name('instructorViews.consultar_comite');
    Route::get('/instructorViews/detalles_comite', [\App\Http\Controllers\InstructorViewController::class, 'detalles_comite'])->name('instructorViews.detalles_comite');
    
});
