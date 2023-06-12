<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Agradecimiento;
use Illuminate\Support\Facades\DB;

class MisAgradecimientos extends Component
{
    public function render()
    {
        $agradecimientos = Agradecimiento::where('users.id', auth()->user()->id)
        ->where('objetos.estado', 2)
            ->join('objetos', 'agradecimientos.objeto_id', '=', 'objetos.id')
            ->join('users', 'objetos.user_id', '=', 'users.id')
            ->select('agradecimientos.*', 'users.nombres', 'objetos.objeto')
            ->latest()
            ->paginate(3);

        //dd($agradecimientos);

        return view('livewire.mis-agradecimientos', [
            'agradecimientos' => $agradecimientos
        ]);
    }
}
