<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use Illuminate\Support\Facades\Auth;

class CartelEncontrado extends Component
{
    public $objeto;
    public $marca;
    public $color;
    public $ubicacion;
    public $descripcion;

    public function render()
    {
        return view('livewire.cartel-encontrado');
    }

    public function crearCartel()
    {
        // Validar si el usuario esta logueado
        if (Auth::check()) {
            // Crear el objeto de CartelPerdido con los datos
            //dd($request->pregunta1);
            Objeto::create([
                'objeto' => $this->objeto,
                'marca' => $this->marca,
                'color' => $this->color,
                'ubicacion' => $this->ubicacion,
                'descripcion' => $this->descripcion,
                'estado' => 2,
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('operdidos');
        }

        // El usuario no está autenticado, redirigir a la página de login o mostrar un mensaje de error
        return redirect()->to('/login');
    }
}
