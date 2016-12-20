<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Usuario;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('validar_usuario', ['only'=>['store']]);
        $this->middleware('validar_edicao_usuario', ['only' => ['update']]);
        $this->middleware('verificar_existencia_usuario', ['only' => ['destroy', 'show','isblocked']]);
        $this->middleware('validar_evento_favorito', ['only' => ['favoriteEvent']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = \App\Usuario::all();
        if (count($usuario) > 0) {
            $usuario_obj = [
                'usuario' => $usuario
            ];
            return response()->json(['data' => $usuario_obj], 200);
        } else {
            return response('Data not found',404);
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
        $usuario_data = $request->usuario_data;
        $usuario =\App\Usuario::create($usuario_data);
        $usuario->save();
        return $usuario;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usario= \App\Usuario::findOrFail($id);
        return $usario;
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
        $data = $request->admin_data;
        $admin = \App\Admin::find($id);
        $admin->fill($data);
        $admin->save();
        return $admin;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(\App\Usuario::destroy($id))
            return abort(200);
        else
            $this->falhou;
    }

    /**
     * Verify the user acess.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function isblocked($id){
        $usario= \App\Usuario::findOrFail($id);
        return $usario->blocked;
    }

    /**
     * Add a evento to the user Resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */

    public function favoriteEvent(Request $request)
    {
        $evento= $request->evento;
        $usuario= $request->usuario;
        $usuario->eventos()->save($evento);
        return $usuario->eventos()->get();
    }
}
