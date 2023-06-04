<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Objeto;

use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ObjetoEdit extends Component
{

    use WithFileUploads;

    public $objetoId;
    public $objeto;
    public $marca;
    public $color;
    public $ubicacion;
    public $descripcion;
    public $valorSentimental;
    public $estado;
    public $valor;
    public $image;
    public $imagen;

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
        'marca' => 'required',
        'color' => 'required|string|min:4|regex:/^[a-zA-ZñÑ\s]+$/u',
        'descripcion' => 'required|string|min:10|max:100|regex:/^[a-zA-Z0-9ñÑ\s]+$/u',
        'ubicacion' => 'required|string|regex:/^[a-zA-ZñÑ\s]+$/u',
    ];

    protected $messages = [
        'objeto.required' => 'El campo OBJETO es requerido.',
        'objeto.min' => 'El campo OBJETO no puede tener más de 3 caracteres.',
        'objeto.max' => 'El campo OBJETO no puede tener más de 50 caracteres.',
        'marca.required' => 'El campo MARCA es requerido',
        'color.required' => 'El campo COLOR es requerido.',
        'color.min' => 'El campo COLOR debe tener al menos 4 caracteres.',
        'color.regex' => 'El campo COLOR solo puede contener letras y espacios.',
        'descripcion.required' => 'El campo DESCRIPCION es requerido.',
        'descripcion.min' => 'El campo DESCRIPCION debe tener al menos 10 caracteres.',
        'descripcion.max' => 'El campo DESCRIPCION no puede tener más de 100 caracteres.',
        'descripcion.regex' => 'El campo DESCRIPCION solo puede contener letras, números y espacios.',
        'ubicacion.required' => 'El campo UBICACION es requerido.',
        'ubicacion.regex' => 'El campo UBICACION solo puede contener letras y espacios.',
    ];

    public function mount($id)
    {
        $this->objetoId = $id;
        $objeto = Objeto::findOrFail($id);
        $this->objeto = $objeto->objeto;
        $this->marca = $objeto->marca;
        $this->color = $objeto->color;
        $this->ubicacion = $objeto->ubicacion;
        $this->descripcion = $objeto->descripcion;
        $this->valorSentimental = $objeto->valor_sentimental;
        $this->estado = $objeto->estado;
        $this->imagen = $objeto->imagen;
    }

    public function updateObjeto()
    {
        // Verificar validación
        $this->validate();

        if ($this->importanceLevel) {
            $this->valor = $this->importanceLevel;
        } else {
            $this->valor = $this->valorSentimental;
        }

        $objeto = Objeto::find($this->objetoId);
        $objeto->update([
            'objeto' => $this->objeto,
            'marca' => $this->marca,
            'color' => $this->color,
            'ubicacion' => $this->ubicacion,
            'descripcion' => $this->descripcion,
            'valor_sentimental' => $this->valor,
        ]);

        if (isset($this->image)) {
            // Renombrar la imagen
            $nombreImagen = str_replace(' ', '_', $this->objeto) . '_' . "actualizado" . '.' . $this->image->extension();
            
            // Almacenar la nueva imagen
            $rutaImagen = $this->image->storeAs('public/imagenes', $nombreImagen);
            $rutaImagen = str_replace('public/', '', $rutaImagen);
            
            // Actualizar la imagen en la base de datos
            $objeto->update(['imagen' => $nombreImagen]);
        }

        // Redireccionar a la vista de detalles del mismo registro
        return redirect()->route('objeto.show', ['id' => $this->objetoId])
            ->with('message', '¡Objeto actualizado exitosamente!');
    }

    public function render()
    {
        return view('livewire.objeto-edit');
    }
}
