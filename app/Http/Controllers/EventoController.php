<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventoController extends Controller
{
    public function __construct(){
        $this->middleware('validar_evento', ['only'=>['store']]);
        $this->middleware('validar_edicao_evento', ['only' => ['update']]);
        $this->middleware('verificar_existencia_evento', ['only' => ['destroy', 'show',]]);
    }

    private $falhou= ['failed'=>'A operacao falhou'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos = new \App\Evento();
        if (count($eventos) > 0) {
            $eventos_obj = [
                'eventos' => $eventos
            ];
            return $eventos_obj;
        } else {
            abort(404);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $eventos = $request->evento;
        $eventos_data = $request->eventos_data;
        $evento=\App\Promotor::create($eventos_data);
        return $evento;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $evento= \App\Usuario::findOrFail($id);
        return $evento;
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->evento_data;
        $evento = $request->evento;
        $evento->fill($data);
        $evento->save();
        return $evento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\App\Evento::destroy($id))
            return abort(200);
        else
            $this->falhou;
    }
}
