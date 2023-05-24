<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Pruebas;
use App\Http\Livewire\Registro;
use App\Http\Livewire\IniciarSesion;
use App\Http\Livewire\CartelEncontrado;
use App\Http\Livewire\CartelPerdido;
use App\Http\Livewire\ObjetosPerdidos;
use App\Http\Livewire\ObjetoDetalle;
use App\Http\Livewire\MisObjetosPerdidos;
use App\Http\Livewire\MisObjetosEncontrados;
use App\Http\Livewire\MisAgradecimientos;
use App\Http\Livewire\AgradecimientoDetalles;
use App\Http\Livewire\ObjetoEdit;

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
    // Ruta para ver los detalles de mis objetos perdidos
    Route::get('/mis-objetos-perdidos', MisObjetosPerdidos::class)->name('mobjetosp');
    // Ruta para ver los detalles de mis objetos encontrados
    Route::get('/mis-objetos-encontrados', MisObjetosEncontrados::class)->name('mobjetose');
    // Ruta para ver los detalles de mis agradecimientos
    Route::get('/mis-agradecimientos', MisAgradecimientos::class)->name('magradecimientos');
    // Ruta para ver los detalles de mis Agradecimientos
    Route::get('/agradecimiento/{id}', AgradecimientoDetalles::class)->name('agradecimiento.show');
    // Ruta para editar los objetos
    Route::get('/objetos/{id}/edit', ObjetoEdit::class)->name('objeto.edit');
});

// Ruta a la pregunta para crear un cartel de objeto perdido/encontrado
Route::get('/pregunta', function () {
    return view('pregunta');
})->name('pregunta');

Route::get('/sobre-nosotros', function () {
    return view('nosotros');
})->name('nosotros');

// Ruta para crear cartel de objeto perdido :'v
Route::get('/crear-cartel-perdido', CartelPerdido::class)->name('cperdido');
// Ruta para crear cartel de objeto encontrado :D
Route::get('/crear-cartel-encontrado', CartelEncontrado::class)->name('cencontrado');
// Ruta para ver los objetos perdidos
Route::get('/objetos-perdidos', ObjetosPerdidos::class)->name('operdidos');