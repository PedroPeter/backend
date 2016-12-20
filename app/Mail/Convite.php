<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Convite extends Mailable
{
    use Queueable, SerializesModels;

    public $view;
    public $viewData;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $viewData)
    {
       $this->view=$view;
       $this->viewDta=$viewData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('pedroxpeter96@gmail.com')->
        view($this->view);
    }
}
