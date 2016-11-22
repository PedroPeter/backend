<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArtistaController extends Controller

{

    public function __construct(){
        $this->middleware('validar_artista', ['only'=>['store']]);
        $this->middleware('validar_edicao_artista', ['only' => ['update']]);
        $this->middleware('verificar_existencia_artista', ['only' => ['destroy', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artista = \App\Usuario::where('enable',true);
        if (count($artista) > 0) {
            $artista_obj = [
                'artista' => $artista
            ];
            return $artista_obj;
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
        $artista_data = $request->artista_data;
        $artista =\App\Usuario::create($artista_data);
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
        return \App\Artista::findOrFail($id);
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
        $artista=\App\Artista::find($id);
        $data = $request->artista_data;
        $artista->fill($data);
        $artista->save();
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
}
