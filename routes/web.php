<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Pruebas;
use App\Http\Livewire\Registro;
use App\Http\Livewire\IniciarSesion;
use App\Http\Livewire\CartelEncontrado;
use App\Http\Livewire\CartelPerdido;
use App\Http\Livewire\ObjetosPerdidos;
use App\Http\Livewire\ObjetoDetalle;

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

Route::get('/', function () {
    return view('inicio');
})->name('indecs');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pruebas', Pruebas::class)->name('pruebas');
    // Ruta para ver los detalles de un objeto perdido
    Route::get('/objeto/{id}', ObjetoDetalle::class)->name('objeto.show');
});

// Ruta a la pregunta para crear un cartel de objeto perdido/encontrado
Route::get('/pregunta', function () {
    return view('pregunta');
})->name('pregunta');

// Ruta para crear cartel de objeto perdido :'v
Route::get('/crear-cartel-perdido', CartelPerdido::class)->name('cperdido');
// Ruta para crear cartel de objeto encontrado :D
Route::get('/crear-cartel-encontrado', CartelEncontrado::class)->name('cencontrado');
// Ruta para ver los objetos perdidos
Route::get('/objetos-perdidos', ObjetosPerdidos::class)->name('operdidos');