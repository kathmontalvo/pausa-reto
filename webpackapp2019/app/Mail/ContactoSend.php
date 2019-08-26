<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactoSend extends Mailable
{
    use Queueable, SerializesModels;

    public $msjs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msjs)
    {
        //
        $this->msjs = $msjs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@pausa.la', 'Web - Pausa')
            ->to('julio@pausa.la')
            ->subject('Contacto')
            ->markdown('emails.contacto');
        //return $this->markdown('emails.contacto');
    }
}
