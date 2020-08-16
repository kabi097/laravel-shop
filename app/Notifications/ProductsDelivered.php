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
    public $sum;
    public $products;
    public $count;
    public $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->sum = $this->order->products->reduce(function ($old, $product) {
            return $old+$product->price*$product->pivot->quantity;
        },0);
        if ($this->count==1) {
            $this->products = 'produkt';
        } elseif ($this->count>4) {
            $this->products = 'produktów';
        } else {
            $this->products = 'produkty';
        }
        $this->count = count($this->order->products);
        $this->ticket = rand(10000000,99999999);    //Demo
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
                    ->level('success')
                    ->subject('Zakupiłeś ' . $this->count . ' ' . $this->products . ' o łącznej wartości ' . $this->sum . ' zł.')
                    ->line('Zakupiłeś ' . $this->count . ' ' . $this->products . ' o łącznej wartości ' . $this->sum . ' zł. Sprawdź swoje zamówienie w tabeli. Poniżej znajduje się twój unikalny kod zamówienia.')
                    ->action('Kliknij tutaj, aby przejść do sklepu.', url('/'))
                    ->greeting('Dziękujemy za zakupy w naszym sklepie!')
                    ->markdown('mail.products.delivered', ['products' => $this->order['products'], 'ticket' => $this->ticket]);
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
            'title' => 'Zakupiłeś ' . $this->count . ' ' . $this->products . ' o łącznej wartości ' . $this->sum . ' zł.',
            'content' => 'Zakupiłeś ' . $this->count . ' ' . $this->products . ' o łącznej wartości ' . $this->sum . ' zł. Sprawdź swoje zamówienie w tabeli. Poniżej znajduje się twój unikalny kod zamówienia.',
            'order' => $this->order,
            'ticket' => $this->ticket, //Demo
            'ending' => 'Dziękujemy za zakupy w naszym sklepie. Zapraszamy ponownie.'
        ];
    }
}
