<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EncuentraloAqui extends Component
{
    public $perdidos = False;

    /* Mostrar el icono del Perdidos */
    public function MostrarPerdidos()
    {
        $this->perdidos = True;
    }
    /* Ocultar el icono del Perdidos */
    public function OcultarPerdidos()
    {
        $this->perdidos = False;
    }
}
