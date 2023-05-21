<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Objeto;

class ObjetoDetalle extends Component
{
    public $detalles;

    public function mount($id)
    {
        $this->detalles = Objeto::find($id);
        dd($this->detalles);
    }

    public function render()
    {
        return view('livewire.objeto-detalle');
    }
}
