<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EventoController;

class PromotorController extends Controller
{
    public function __construct() {
        $this->middleware('verificar_existencia_usuario', ['only' => ['index', 'store']]);
        $this->middleware('validar_criacao_admin', ['only' => ['store']]);
        $this->middleware('verificar_existencia_promotor', ['only' => ['show', 'destroy',]]);
        $this->middleware('validar_edicao_admin', ['only' => ['update']]);
    }
    private $falhou=
    ['failed'=>'A operacao falhou'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = \App\Usuario::where('enable',true);
        $promotor = $usuarios->promotor()->get();
        if (count($promotor) > 0) {
            $promotor_obj = [
                'promotor' => $promotor
            ];

            return $promotor_obj;
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
        $usuario = $request->usuario;
        $promotor_data = $request->promotor_data;
        $promotor = $usuario->promotor()->create($promotor_data);
        return $promotor;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admin= \App\Admin::findOrFail($id);
        return $admin;
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
        $data = $request->promotor_data;
        $promotor = $request->promotor;
        $promotor->fill($data);
        $promotor->save();
        return $promotor;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        {
            if(\App\Promotor::destroy($id))
                return abort(200);
            else
                $this->falhou;

        }
    }

    /**
     * Add a specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addEvento(Request $request)
    {
        return EventoController()->store($request);
    }

    /**
     * Add a specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $id
     */
    public function removeEvento($id)
    {
        return EventoController()->destroy($id);
    }


}
