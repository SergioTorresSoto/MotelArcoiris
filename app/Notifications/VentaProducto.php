<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Producto;
use App\ProductoUsuario;
use App\DetalleVenta;
use App\User;
use Illuminate\Support\Facades\Auth;

class VentaProducto extends Notification
{
    use Queueable;
    protected $venta;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($venta)
    {
        $this->venta = $venta;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    {
        return [
            'venta' => $this->venta,
            
            'user' => User::find(Auth::id())
        ];
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
