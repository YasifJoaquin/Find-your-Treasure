<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Objeto;
use Illuminate\Support\Facades\Auth;

class MisObjetosEncontrados extends Component
{
    public function render()
    {
        $misobjetos = Objeto::where('user_id', auth()->user()->id)
        ->where('estado', 2)
        ->where('oculto', 2)
        ->latest()
        ->paginate(3);
        //dd($misobjetos);
        return view('livewire.mis-objetos-encontrados', [
            'misobjetos' => $misobjetos
        ]);
    }
}
