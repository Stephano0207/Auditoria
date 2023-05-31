<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $data;
   
    public function __construct($data)
    {
        $this->data = $data;
         // $this->name = $data['name'];
       
    }

    public function build(){
        // $image = $this->data['image'];
        // $path = public_path() . '/images/' . $image;

        return $this->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'))
                ->subject('Registro de Actividad-Reporte')
                ->view('correo.correo')
                ->with(['data' => $this->data]);
                // ->attach($path, ['as' => $image]);
                   
    }

}