<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Objeto;

class ObjetoEdit extends Component
{
    public $objetoId;
    public $objeto;
    public $marca;
    public $color;
    public $ubicacion;
    public $descripcion;
    public $valorSentimental;
    public $estado;
    public $imagen;
    public $valor;

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

        if ($this->importanceLevel) {
            $this->valor = $this->importanceLevel;
        } else {
            $this->valor = $this->valorSentimental;
        }

        $objeto = Objeto::findOrFail($this->objetoId);
        $objeto->update([
            'objeto' => $this->objeto,
            'marca' => $this->marca,
            'color' => $this->color,
            'ubicacion' => $this->ubicacion,
            'descripcion' => $this->descripcion,
            'valor_sentimental' => $this->valor,
            'imagen' => $this->imagen,
        ]);

        // Redireccionar a la vista de detalles del mismo registro
    return redirect()->route('objeto.show', ['id' => $this->objetoId])
        ->with('message', '¡Objeto actualizado exitosamente!');
    }

    public function render()
    {
        return view('livewire.objeto-edit');
    }
}
