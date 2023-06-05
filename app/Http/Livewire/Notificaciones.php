<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Objeto;
use App\Models\User;

use App\Notifications\ClientNotification;
use App\Events\ClientEvent;

use RealRashid\SweetAlert\Facades\Alert;

class Notificaciones extends Component
{
    use WithPagination;

    //auth()->user()->unreadNotifications->markAsRead();

    public function render()
    {
        $notificaciones = auth()->user()->unreadNotifications()->paginate(6);

        return view('livewire.notificaciones', [
            'notificaciones' => $notificaciones
        ]);
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
        
        //$this->publicar($objeto);

        //auth()->user()->unreadNotifications->markAsRead();
        //session()->flash('message', 'Notificación aceptada correctamente.');

        //return redirect()->route('notificaciones');
        Alert::toast('Cartel Aceptado','Satisfactorio');
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
        //session()->flash('message', 'Notificación rechazada correctamente.');
        Alert::toast('Cartel Rechazado','Satisfactorio');
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