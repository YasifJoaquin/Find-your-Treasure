<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agradecimiento;

class AgradecimientoDetalles extends Component
{
    public $agradecimientos;

    public function mount($id)
    {
        $this->agradecimientos = Agradecimiento::find($id);
        //dd($this->agradecimientos);
    }

    public function render()
    {
        return view('livewire.agradecimiento-detalles');
    }
}