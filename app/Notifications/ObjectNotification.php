<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Objeto;

class ObjectNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $objeto;
    
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
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Solicitud de nuevo cartel')
                    ->greeting('Hola Vigia')
                    ->line('Un nuevo objeto ha sido registrado y está a la espera de su aprovacion')
                    ->line('Objeto: ' . $this->objeto->objeto)
                    ->line('Estado: ' . $this->objeto->estado)
                    ->action('Ir a la plataforma', route('notificaciones'))
                    ->line('Tomese el tiempo de verificar la información ya que');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->objeto->id,
            'objeto' => $this->objeto->objeto,
            'marca' => $this->objeto->marca,
            'color' => $this->objeto->color,
            'ubicacion' => $this->objeto->ubicacion,
            'descripcion' => $this->objeto->descripcion,
            'valor_sentimental' => $this->objeto->valor_sentimental,
            'estado' => $this->objeto->estado,
            'imagen' => $this->objeto->imagen,
            'user_id' => $this->objeto->user->nombres,
        ];
    }
}
