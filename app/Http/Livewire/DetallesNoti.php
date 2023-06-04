<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Objeto;

use App\Models\User;

use App\Notifications\ClientNotification;
use App\Events\ClientEvent;

class DetallesNoti extends Component
{
    public $detalles;
    public $cantidad_valor;

    public function mount($id)
    {
        $this->detalles = auth()->user()->unreadNotifications->find($id);
        $this->cantidad_valor = $this->detalles->data['valor_sentimental'];
    }

    public function aceptar_noti($id_notificacion, $id_objeto)
    {
        $objeto = Objeto::find($id_objeto);
        $this->publicar($objeto);
        $objeto->update([
            'aceptado' => 1,
        ]);

        auth()->user()->unreadNotifications
            ->when($id_notificacion, function($query) use ($id_notificacion){
                return $query->where('id', $id_notificacion);
            })->markAsRead();

        //auth()->user()->unreadNotifications->markAsRead();
        session()->flash('message', 'Notificación aceptada correctamente.');

        return redirect()->route('notificaciones');
    }

    public function rechazar_noti($id_notificacion, $id_objeto)
    {
        $objeto = Objeto::find($id_objeto);
        $objeto->update([
            'aceptado' => 2,
        ]);

        auth()->user()->unreadNotifications
            ->when($id_notificacion, function($query) use ($id_notificacion){
                return $query->where('id', $id_notificacion);
            })->markAsRead();

        //auth()->user()->unreadNotifications->markAsRead();
        session()->flash('message', 'Notificación rechazada correctamente.');

        return redirect()->route('notificaciones');
    }

    public function render()
    {
        return view('livewire.detalles-noti', [
            'detalles' => $this->detalles
        ]);
    }

    public function publicar($objeto)
    {
        //event(new ClientEvent($objeto));
        $user = User::find($objeto->user_id);

        if ($user) {
            $user->notify(new ClientNotification($objeto));
            event(new ClientEvent($objeto));
        }
    }
}