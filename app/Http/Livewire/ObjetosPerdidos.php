<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use Livewire\WithPagination;

class ObjetosPerdidos extends Component
{

    public function render()
    {
        $objetos = Objeto::where('estado', '!=', 4)
                    ->where('oculto','!=', 1)
                    ->latest()->paginate(3);

        return view('livewire.objetos-perdidos', [
            'objetos' => $objetos
        ]);
    }
}
