<?php

namespace App\Notifications;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProductsDelivered extends Notification
{
    use Queueable;

    public $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
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
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Zakupiłeś ' . count($this->order->products) . ' produktów.')
                    ->action('Kliknij tutaj, aby przejść do sklepu.', url('/'))
                    ->greeting('Dziękujemy za zakupy w naszym sklepie!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $count = count($this->order->products);
        $sum = $this->order->products->reduce(function ($old, $product) {
            return $old+$product->price*$product->pivot->quantity;
        },0);
        return [
            "title" => "Twoje zamówienie zostało zrealizowane.",
            "content" => 'Zakupiłeś ' . $count . ' produktów o łącznej wartości ' . $sum . ' zł. Dziękujemy za zakupy w naszym sklepie. Zapraszamy ponownie.'
        ];
    }
}
