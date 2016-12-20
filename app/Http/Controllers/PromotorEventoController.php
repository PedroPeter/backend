<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Convite;
use Illuminate\Support\Facades\Mail;
use \App\Http\Controllers\EventoController;

class PromotorEventoController extends Controller
{

    /**
     * Send invites do user prefered promotor event's.
     *
     * @param  $view
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function enviarConvites($view, $id)
    {
        $promotor= \App\Promotor::find($id);
        $eventType=$promotor->eventos->type;
        $usuarios= \App\Usuario::where('eventoFavorito',$eventType);
        Mail::to($usuarios)->send(new Mail($view));
    }

}
