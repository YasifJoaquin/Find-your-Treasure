<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $cantidad_noti;

    public function mount()
    {
        if(Auth::check())
        {
            $this->cantidad_noti = Auth::user()->unreadNotifications->count();
        }
    }

    public function render()
    {
        return view('livewire.menu');
    }
}
