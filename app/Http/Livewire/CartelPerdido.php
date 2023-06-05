<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

use App\Notifications\ObjectNotification;
use App\Events\ObjectEvent;

class CartelPerdido extends Component
{

    use WithFileUploads;

    public $objeto;
    public $marca;
    public $color;
    public $ubicacion;
    public $descripcion;
    public $image;

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
        'objeto' => 'required|string|min:3|max:20',
        'color' => 'required|string|min:4|regex:/^[a-zA-Z0-9ñÑ\s]+$/u',
        'descripcion' => 'required|string|min:10|max:30|regex:/^[a-zA-Z0-9ñÑ\s]+$/u',
        'ubicacion' => 'required|string|regex:/^[a-zA-Z0-9ñÑ\s]+$/u',
        'image' => 'required|mimes:jpg,jpeg,png|max:10240|image',
    ];

    protected $messages = [
        'objeto.required' => 'El campo OBJETO es requerido.',
        'objeto.min' => 'El campo OBJETO no puede tener más de 3 caracteres.',
        'objeto.max' => 'El campo OBJETO no puede tener más de 20 caracteres.',
        'color.required' => 'El campo COLOR es requerido.',
        'color.min' => 'El campo COLOR debe tener al menos 4 caracteres.',
        'color.regex' => 'El campo COLOR solo puede contener letras, números y espacios.',
        'descripcion.required' => 'El campo DESCRIPCION es requerido.',
        'descripcion.min' => 'El campo DESCRIPCION debe tener al menos 10 caracteres.',
        'descripcion.max' => 'El campo DESCRIPCION no puede tener más de 30 caracteres.',
        'descripcion.regex' => 'El campo DESCRIPCION solo puede contener letras, números y espacios.',
        'ubicacion.required' => 'El campo UBICACION es requerido.',
        'ubicacion.regex' => 'El campo UBICACION solo puede contener letras, números y espacios.',
        'image.required' => 'Se necesita una imagen del objeto',
        'image.mime' => 'Los formatos de imagenes validos son jpg, jpeg y png',
        'image.max' => 'El tamaño maximo de la imagen debe de ser de 10mb',
    ];

    public function render()
    {
        return view('livewire.cartel-perdido');
    }

    public function crearCartel()
    {
        //dd($this->validate());
        // Accion de validar
        $this->validate();

        //Renombrar la imagen 
        $nombreImagen = str_replace(' ', '_', $this->objeto) . '_' . "perdido" . '.' . $this->image->extension();

        // Validar si el usuario esta logueado
        if (Auth::check()) {
            // Crear el objeto de CartelPerdido con los datos
            //dd($rutaImagen, $nombreImagen);

            $nuevo_objeto = Objeto::create([
                'objeto' => $this->objeto,
                'marca' => $this->marca,
                'color' => $this->color,
                'ubicacion' => $this->ubicacion,
                'descripcion' => $this->descripcion,
                'valor_sentimental' => $this->importanceLevel,
                'imagen' => $nombreImagen,
                'estado' => 1,
                'oculto' => 2,
                'user_id' => auth()->user()->id,
            ]);
            //guardar la imagen despues de insertar para evitar los 
            $rutaImagen = $this->image->storeAs('public/imagenes', $nombreImagen);
            $rutaImagen = str_replace('public/', '', $rutaImagen);

            //guardar notificacion de objeto creado en la Base de Datos
            $this->notificacion($nuevo_objeto);
            
            return redirect()->route('mobjetosp');
        }

        // El usuario no está autenticado, redirigir a la página de login o mostrar un mensaje de error
        return redirect()->to('/login');
    }

    public function notificacion($nuevo_objeto)
    {
        User::role('vigia')
            ->each(function(User $user) use ($nuevo_objeto){
                $user->notify(new ObjectNotification($nuevo_objeto));
                event(new ObjectEvent($nuevo_objeto));
            });
    }
}