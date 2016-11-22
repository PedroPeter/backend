<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    public function __construct(){
        $this->middleware('validar_usuario', ['only'=>['store']]);
        $this->middleware('validar_edicao_usuario', ['only' => ['update']]);
        $this->middleware('verificar_existencia_usuario', ['only' => ['destroy', 'show','isblocked']]);
    }

    private $falhou=(
        ['failed'=>'A operacao falhou']
        );
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = \App\Usuario::where('enable',true);
        if (count($usuario) > 0) {
            $usuario_obj = [
                'usuario' => $usuario
            ];
            return $usuario_obj;
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
        $usuario_data = $request->usuario_data;
        $usuario =\App\Usuario::create($usuario_data);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
}
