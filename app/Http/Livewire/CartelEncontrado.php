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

use RealRashid\SweetAlert\Facades\Alert;

class CartelEncontrado extends Component
{
    use WithFileUploads;

    public $objeto;
    public $marca;
    public $color;
    public $ubicacion;
    public $descripcion;
    public $image;

    // Validacion de los inputs
    protected $rules = [
        'objeto' => 'required|string|min:3|max:20',
        'color' => 'required|string|min:4|max:20|regex:/^[a-zA-Z0-9ñÑ\s]+$/u',
        'descripcion' => 'required|string|min:10|max:45|regex:/^[a-zA-Z0-9ñÑ\s,.]+$/u',
        'ubicacion' => 'required|string|regex:/^[a-zA-Z0-9ñÑ\s]+$/u',
        'image' => 'required|mimes:jpg,jpeg,png|max:10240|image',
    ];

    protected $messages = [
        'objeto.required' => 'El campo OBJETO es requerido.',
        'objeto.string' => 'El campo OBJETO solo admite caracteres alfanuméricos.',
        'objeto.min' => 'El campo OBJETO no puede tener más de 3 caracteres.',
        'objeto.max' => 'El campo OBJETO no puede tener más de 20 caracteres.',
        'color.required' => 'El campo COLOR es requerido.',
        'color.string' => 'El campo COLOR solo admite caracteres alfanuméricos.',
        'color.min' => 'El campo COLOR debe tener al menos 4 caracteres.',
        'color.max' => 'El campo COLOR debe tener al menos 20 caracteres.',
        'color.regex' => 'El campo COLOR solo puede contener letras, números y espacios.',
        'descripcion.required' => 'El campo DESCRIPCION es requerido.',
        'descripcion.string' => 'El campo DESCRIPCION solo admite caracteres alfanuméricos.',
        'descripcion.min' => 'El campo DESCRIPCION debe tener al menos 10 caracteres.',
        'descripcion.max' => 'El campo DESCRIPCION no puede tener más de 45 caracteres.',
        'descripcion.regex' => 'El campo DESCRIPCION solo puede contener letras, números, espacios, puntos y comas.',
        'ubicacion.required' => 'El campo UBICACION es requerido.',
        'ubicacion.string' => 'El campo UBICACION solo admite caracteres alfanuméricos.',
        'ubicacion.regex' => 'El campo UBICACION solo puede contener letras, números y espacios.',
        'image.required' => 'Se necesita una imagen del objeto',
        'image.mime' => 'Los formatos de imagenes validos son jpg, jpeg y png',
        'image.max' => 'El tamaño maximo de la imagen debe de ser de 10mb',
    ];

    public function render()
    {
        return view('livewire.cartel-encontrado');
    }

    public function crearCartel()
    {
        // Verificar validacion
        $this->validate();

        //Renombrar la imagen 
        $nombreImagen = str_replace(' ', '_', $this->objeto) . '_' . "encontrado" . '.' . $this->image->extension();

        // Validar si el usuario esta logueado
        if (Auth::check()) {
            // Crear el objeto de CartelPerdido con los datos
            //dd($this->validate());
            $nuevo_objeto = Objeto::create([
                'objeto' => $this->objeto,
                'marca' => $this->marca,
                'color' => $this->color,
                'ubicacion' => $this->ubicacion,
                'descripcion' => $this->descripcion,
                'imagen' => $nombreImagen,
                'estado' => 2,
                'oculto' => 2,
                'aceptado' => 1,
                'user_id' => auth()->user()->id,
            ]);

            $rutaImagen = $this->image->storeAs('public/imagenes', $nombreImagen);
            $rutaImagen = str_replace('public/', '', $rutaImagen);
            //crear nueva notificacion
            $this->notificacion($nuevo_objeto);

            // Mensaje de alerta
            Alert::success('SuccessAlert','En breve se le notificara si su cartel cumple con las normativas de la pagina');
            // Redireccionamiento
            return redirect()->route('mobjetose');

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