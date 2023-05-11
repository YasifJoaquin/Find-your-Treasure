<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Objeto;
use App\Models\Clasificacion;
use App\Models\ClasificacionObjeto;


class Pruebas extends Component
{
    public $usu, $objetos, $clasificacion, $user_objetos, $objetos_clasificacion;



    public function mount()
    {
        $this->usu= User::all();
        $this->objetos = Objeto::all();
        $this->clasificacion = Clasificacion::all();
        $this->objetos_clasificacion = ClasificacionObjeto::all();
        //dd($this->objetos);
    }

    public function render()
    {
        return view('livewire.pruebas');

    }
}
