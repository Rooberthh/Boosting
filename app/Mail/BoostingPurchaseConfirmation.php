<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BoostingPurchaseConfirmation extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user, $order;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $order
     */
    public function __construct($user, $order)
    {
        $this->user = $user;
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.boosting-purchase-confirmation');
    }
}
