<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaysuccessEmial extends Mailable
{
    use Queueable, SerializesModels;

    public $order; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->data=$order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->from('kaziShop11@gmail.com')->view('Email.paymentcomplete',['data'=>$this->data])->subject(' successfully payment done ');
   
    }
}
