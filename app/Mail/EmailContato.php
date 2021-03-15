<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailContato extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The order instance.
     *
     * @var \App\Models'Contato
     */
    public $dadosContato;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($dadosContato)
    {
        $this->dadosContato = $dadosContato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.contato')
            ->with(["dados" => $this->dadosContato]);
    }
}
