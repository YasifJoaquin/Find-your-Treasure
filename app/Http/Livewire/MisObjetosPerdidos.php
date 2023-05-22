<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use Illuminate\Support\Facades\Auth;

class MisObjetosPerdidos extends Component
{
    public function render()
    {
        $misobjetos = Objeto::where('user_id', auth()->user()->id)
        ->where('estado', 1)
        ->paginate(3);
        //dd($misobjetos);
        return view('livewire.mis-objetos-perdidos', [
            'misobjetos' => $misobjetos
        ]);
    }
}