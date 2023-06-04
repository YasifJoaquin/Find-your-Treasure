<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Objeto;

class ObjetoDetalle extends Component
{
    public $detalles;
    public $cantidad_valor;
    public $estado;
    public $user;

    public function mount($id)
    {
        $this->detalles = Objeto::find($id);
        $this->cantidad_valor = $this->detalles->valor_sentimental;
        $this->estado = $this->detalles->estado;
        $this->user = $this->detalles->user_id;
        //dd($this->estado);
    }

    public function eliminar($id)
    {
        $publicacion = Objeto::find($id);
        $publicacion->update([
            'oculto' => 1,
        ]);

        return redirect()->route('operdidos');
    }

    public function render()
    {
        return view('livewire.objeto-detalle');
    }
}
