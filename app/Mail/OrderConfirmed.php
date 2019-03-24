<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmed extends Mailable
{
    use Queueable, SerializesModels;

    public $order, $days;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $days)
    {
        $this->order = $order;
        $this->days = $days;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ORDER UPDATE')->markdown('mail.order_confirmed');
    }
}
