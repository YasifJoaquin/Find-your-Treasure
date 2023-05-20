<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Pruebas;
use App\Http\Livewire\Registro;
use App\Http\Livewire\IniciarSesion;
use App\Http\Livewire\CartelEncontrado;
use App\Http\Livewire\CartelPerdido;

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
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pruebas', Pruebas::class)->name('pruebas');
});

// Ruta a la pregunta para crear un cartel de objeto perdido/encontrado
Route::get('/pregunta', function () {
    return view('pregunta');
})->name('pregunta');

Route::get('/crear-cartel-perdido', CartelPerdido::class)->name('cperdido');

Route::get('/crear-cartel-encontrado', CartelEncontrado::class)->name('cencontrado');