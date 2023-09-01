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

    Route::get('/InstructorViews/solicitar3', [\App\Http\Controllers\InstructorViewController::class, 'solicitar3'])->name('instructorViews.solicitar3');
    Route::post('/InstructorViews/solicitar3', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar3'])->name('instructorViews.storeSolicitar3');

    Route::get('/InstructorViews/solicitar4', [\App\Http\Controllers\InstructorViewController::class, 'solicitar4'])->name('instructorViews.solicitar4');
    Route::post('/InstructorViews/solicitar4', [\App\Http\Controllers\InstructorViewController::class, 'storeSolicitar4'])->name('instructorViews.storeSolicitar4');

    Route::get('/InstructorViews/solicitar5', [\App\Http\Controllers\InstructorViewController::class, 'solicitar5'])->name('instructorViews.solicitar5');
});
