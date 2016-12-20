<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistaController extends Controller

{

    public function __construct(){
        $this->middleware('validar_artista', ['only'=>['store']]);
        $this->middleware('validar_edicao_artista', ['only' => ['update']]);
        $this->middleware('verificar_existencia_artista', ['only' => ['destroy', 'show','addEvento']]);
        $this->middleware('verificar_existencia_evento', ['only' => ['addEvento']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artista = \App\Artista::all();
        if (count($artista) > 0) {
            $artista_obj = [
                'artista' => $artista
            ];
            return $artista_obj;
        } else {
            return $this->response()-json(['Users'=>'Nenhurm usuario persistido'],404);
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
        $artista_data = $request->artista_data;
        $artista =\App\Artista::create($artista_data);
        $evento=$request->evento;
        $artista->evento()->create($evento);
        $artista->save();
        return $artista;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Artista::find($id);
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
        $data = $request->artista_data;
        $artista=$request->artista;
        $artista->save($data);
        return $artista;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Artista::destroy($id);
    }

    /**
     * Relate Artista and Evento.
     *
     * @params  int  $id1,$id2
     * @return \Illuminate\Http\Response
     */
    public function addEvento($id1,$id2)
    {
        $artista= \App\Artista::findOrFail($id1);
        $evento= \App\Evento::findOrFail($id2);
        $artista->evento()->create($evento);
        return $artista->save();
    }
}
