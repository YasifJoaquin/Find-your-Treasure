<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $mapita = False;
    public $perfil = False;
    public $cartel = False;
    public $tesoro = False;
    public $botin = False;
    public $nosotros = False;

    public $cantidad_noti;

    public function mount()
    {
        if(Auth::check())
        {
            $this->cantidad_noti = Auth::user()->unreadNotifications->count();
        }
    }

    /* Mostrar el icono del Mapita */
    public function MostrarMapita()
    {
        $this->mapita = True;
    }
    /* Ocultar el icono del Mapita */
    public function OcultarMapita()
    {
        $this->mapita = False;
    }

    /* Mostrar el icono del Perfil */
    public function MostrarPerfil()
    {
        $this->perfil = True;
    }
    /* Ocultar el icono del Perfil */
    public function OcultarPerfil()
    {
        $this->perfil = False;
    }

    /* Mostrar el icono del Cartel */
    public function MostrarCartel()
    {
        $this->cartel = True;
    }
    /* Ocultar el icono del Cartel */
    public function OcultarCartel()
    {
        $this->cartel = False;
    }

    /* Mostrar el icono del Tesoro */
    public function MostrarTesoro()
    {
        $this->tesoro = True;
    }
    /* Ocultar el icono del Tesoro */
    public function OcultarTesoro()
    {
        $this->tesoro = False;
    }

    /* Mostrar el icono del Botin */
    public function MostrarBotin()
    {
        $this->botin = True;
    }
    /* Ocultar el icono del Botin */
    public function OcultarBotin()
    {
        $this->botin = False;
    }

    /* Mostrar el icono del Nosotros */
    public function MostrarNosotros()
    {
        $this->nosotros = True;
    }
    /* Ocultar el icono del Nosotros */
    public function OcultarNosotros()
    {
        $this->nosotros = False;
    }

    public function render()
    {
        return view('livewire.menu');
    }
}
