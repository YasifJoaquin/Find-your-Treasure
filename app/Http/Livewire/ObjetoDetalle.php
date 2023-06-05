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
    public $rol;

    public function mount($id)
    {
        $this->detalles = Objeto::find($id);
        $this->cantidad_valor = $this->detalles->valor_sentimental;
        $this->estado = $this->detalles->estado;
        $this->user = $this->detalles->user_id;

        $this->rol = auth()->user()->hasRole('marinero');
        //dd($this->rol);
    }

    public function eliminar($id)
    {
        $publicacion = Objeto::find($id);

        if($this->rol == false){
            $publicacion->delete();
        } else {
            $publicacion->update([
                'oculto' => 1,
            ]);
        }

        return redirect()->route('operdidos');
    }

    public function render()
    {
        return view('livewire.objeto-detalle');
    }
}
