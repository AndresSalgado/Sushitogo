<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\pedido;

class PedidoTerminadoNotification extends Notification
{
    use Queueable;

    protected $pedido;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(pedido $pedido)
    {
        $this->pedido = $pedido;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pedido terminado')
            ->greeting('Estimado cliente')
            ->line('¡Su pedido ha sido terminado!')
            ->line('El pedido con el Código-' . $this->pedido->codigo . ' ha sido terminado.')
            ->action('Ver detalles del pedido', route('Factura.detalle', ['id' => $this->pedido->id]))
            ->line('Gracias por utilizar nuestro servicio.')
            ->salutation('Atentamente,')
            ->salutation('Sushi To Go');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
