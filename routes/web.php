<?php

use App\Http\Controllers\UserController;
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
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
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
});