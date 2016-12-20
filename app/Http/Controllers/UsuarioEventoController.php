<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioEventoController extends Controller
{

    function __construct()
    {
        $this->middleware('verificar_existencia_evento', ['only' => ['like'],['comemt'],['post']]);
        $this->middleware('verificar_existencia_usuario', ['only' => ['comemt']]);

    }


    /**
     * Incremets likes of the resource.
     *    @param  Request  $request
     * @return \Illuminate\Http\Response
     */


    public function like(Request  $request)
    {
        $evento=$request->evento;
        $likes=$evento->like +1;
        $evento->likes=$likes;
        $evento->save();
        return $evento->likes;
    }

    /**
     * Comments a Event.
     *
     *  @param  Request  $request
     * @return \Illuminate\Http\Response
     * @return \Illuminate\Http\Response
     */
    public function coment(Request  $request)
    {
        $evento=$request->evento;
        $usuario=$request->usuario;
        $coment=$request->coment;
        if(isset($coment)){
            $evento->comentarios()->create($coment);
            $evento->save();
            return $coment;
        }else{
            return $this->response()->json(['coment_not_found'],404);
        }


    }

    /**
     * Display the specified resource.
     *
     *  @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function post(Request  $request)
    {
        $evento=$request->evento;
        $path=$request->path;
        if(!isset($path)){
            $evento->postar()->create($path);
            $evento->save();

        }else{
            return response()->json(['path_not_found'], 404);
        }


    }


}
