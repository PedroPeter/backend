<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PromotorController;


class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('verificar_existencia_usuario', ['only' => ['index', 'store']]);
        $this->middleware('validar_criacao_admin', ['only' => ['store']]);
        $this->middleware('verificar_existencia_admin', ['only' => ['show', 'destroy']]);
        $this->middleware('verificar_existencia_promotor', ['only' => ['addPromotor', 'removePromotor']]);
        $this->middleware('validar_edicao_admin', ['only' => ['update']]);
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
        $usuarios = \App\Admin::where('enable', true);
        $admin = $usuarios->admin()->get();
        if (count($admin) > 0) {
            $admin_obj = [
                'admin' => $admin
            ];

            return $admin_obj;
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
        $admin_data = $request->admin_data;
        $admin = $usuario->admin()->create($admin_data);
        return $admin;

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
        $data = $request->admin_data;
        $admin = $request->admin;
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
        if(\App\Admin::destroy($id))
            return abort(200);
        else
            $this->falhou;

    }

    /**
     * Enable a specified Promotor resource to act.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function addPromotor($id)
    {
        $promotor=\App\Promotor::find($id);
        $promotor->usuario->enable=true;
    }

    /**
     * Blocks a specified Usuario resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function blockUsuario($id)
    {
        $usuario=\App\Usuario::find($id);
        $usuario->enable=true;
    }


    /**
     * Removes a specified Promotor.
     *
     * @param  int  $id
     */

    public function removePromotor($id)
    {
        PromotorController()->destroy($id);
    }
}
