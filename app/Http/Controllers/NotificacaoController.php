<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificacaoController extends Controller
{
    public function  __construct(){
        $this->middleware('validar_notificacao', ['only'=>['store']]);
        $this->middleware('validar_notificar', ['only'=>['notificar']]);
        $this->middleware('validar_edicao_notificacao', ['only' => ['update']]);
        $this->middleware('verificar_existencia_notificacao', ['only' => ['destroy', 'show']]);
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notificacoes = \App\Notificacao::all();
        if (count($notificacoes) > 0) {
            $notificacoes_obj = [
                'notificacoes' => $notificacoes
            ];
            return $notificacoes_obj;
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
        $notificacao_data = $request->Notificacao_data;
        $notificacao =\App\Notificacao::create($notificacao_data);
        $notificacao->save();
        return $notificacao;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Notificacao::findOrFail($id);
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
        $noticacao=\App\Notificacao::find($id);
        $data = $request->notificacao_data;
        $noticacao->fill($data);
        $noticacao->save();
        return $noticacao;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return \App\Notificacao::destroy($id);
    }

    /**
     * Notif users of the system.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function notificar(Request $request, $id){
        $notificacao= \App\Notificacao::findOrFail($id);
        $usuarios=$request['usuarios'];
        $usuarios->notificacoes()->creat($usuarios);
        $notificacao->usuarios()->create($usuarios);
        $usuarios->save();
        return $usuarios;
    }
}
