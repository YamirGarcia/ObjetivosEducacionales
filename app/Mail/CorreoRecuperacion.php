<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoRecuperacion extends Mailable
{
    use Queueable, SerializesModels;
    public $correo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correo)
    {
        //
        $this->correo = $correo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->view('view.name');
        return $this->subject('Recuperacion de Contraseña Objetivos Educacionales')->view('correos.correos-plantilla');
    }
}
