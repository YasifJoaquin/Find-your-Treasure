<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Objeto;

class ClientNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(Object $objeto)
    {
        $this->objeto = $objeto;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Aprovacion de cartel')
                    ->greeting('Ahoy Marinero!')
                    ->line('Enhorabuena '. $this->objeto->user->nombres . '!. Tu objeto: '. $this->objeto->objeto .' ha sido posteado en el mural de los mas buscados')
                    ->action('Ver Objetos perdidos', url('operdidos'))
                    ->line('Gracias su preferencia <3');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
