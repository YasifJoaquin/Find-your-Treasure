<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use Illuminate\Support\Facades\Auth;

class CartelPerdido extends Component
{

    public $objeto;
    public $marca;
    public $color;
    public $ubicacion;
    public $descripcion;

    // Variable donde se almacenara el valor de la importancia
    public $importanceLevel = 0;
    // Metodo para "escuchar" el valor de la importancia
    protected $listeners = ['importanceUpdated' => 'handleImportanceUpdated'];
    // Metodo para "escuchar" el valor de la importancia
    public function handleImportanceUpdated($level)
    {
        // Realiza acciones con el valor de importancia recibido
        // por ejemplo, almacenar en una variable o guardar en la base de datos
        $this->importanceLevel = $level;
    }

    // Validacion de los inputs
    protected $rules = [
        'objeto' => 'required|string|min:3|max:50',
        'color' => 'required|string|min:4|regex:/^[a-zA-Z0-9\s]+$/u',
        'descripcion' => 'required|string|min:10|max:100|regex:/^[a-zA-Z0-9\s]+$/u',
        'ubicacion' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/u',
    ];

    protected $messages = [
        'objeto.required' => 'El campo OBJETO es requerido.',
        'objeto.min' => 'El campo OBJETO no puede tener más de 3 caracteres.',
        'objeto.max' => 'El campo OBJETO no puede tener más de 50 caracteres.',
        'color.required' => 'El campo COLOR es requerido.',
        'color.min' => 'El campo COLOR debe tener al menos 4 caracteres.',
        'color.regex' => 'El campo COLOR solo puede contener letras, números y espacios.',
        'descripcion.required' => 'El campo DESCRIPCION es requerido.',
        'descripcion.min' => 'El campo DESCRIPCION debe tener al menos 10 caracteres.',
        'descripcion.max' => 'El campo DESCRIPCION no puede tener más de 100 caracteres.',
        'descripcion.regex' => 'El campo DESCRIPCION solo puede contener letras, números y espacios.',
        'ubicacion.required' => 'El campo UBICACION es requerido.',
        'ubicacion.regex' => 'El campo UBICACION solo puede contener letras, números y espacios.',
    ];

    public function render()
    {
        return view('livewire.cartel-perdido');
    }

    public function crearCartel()
    {
        // Verificar validacion
        $this->validate();

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
                'valor_sentimental' => $this->importanceLevel,
                'estado' => 1,
                'user_id' => auth()->user()->id,
            ]);
            return redirect()->route('operdidos');
        }

        // El usuario no está autenticado, redirigir a la página de login o mostrar un mensaje de error
        return redirect()->to('/login');
    }
}