<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use Livewire\WithPagination;

class ObjetosPerdidos extends Component
{

    public function render()
    {
        $objetos = Objeto::where('aceptado', 1)
                    ->where('estado', '!=', 4)
                    ->where('oculto', 2)
                    ->latest()
                    ->paginate(3);

        //dd($objetos);

        return view('livewire.objetos-perdidos', [
            'objetos' => $objetos
        ]);
    }
}
