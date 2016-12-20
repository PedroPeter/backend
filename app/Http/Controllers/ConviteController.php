<?php

namespace App\Http\Controllers;

use App\Mail\Convite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promotor;
use App\Usuario;
use Illuminate\Support\Facades\Mail;


class ConviteController extends Controller
{
    public function __construct(){
        $this->middleware('validar_convite', ['only'=>['store']]);
        $this->middleware('validar_edicao_convite', ['only' => ['update']]);
        $this->middleware('verificar_existencia_convite', ['only' => ['destroy', 'show']]);
        $this->middleware('verificar_existencia_usuario', ['only' => ['sendConvite']]);
        $this->middleware('validar_envio_convite',['only'=>'sendConvite']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $convite = \App\Convite::all();
        if (count($convite) > 0) {
            $convite_obj = [
                'convite' => $convite
            ];
            return $convite_obj;
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
        $convite_data = $request->convite_data;
        $convite =\App\Convite::create($convite_data);
        $convite->save();
        return $convite;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return \App\Convite::findOrFail($id);
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
        $data = $request->convite_data;
        $convite=\App\Convite::find($id);
        $convite->fill($data);
        $convite->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Convite::destroy($id);
    }


    /**
     * Send invites to resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function sendConvite(Request $request)
    {
        $promotor_id=$request->route()->parameter('promotores');
        $promotor= \App\Promotor::find($promotor_id);
        $eventosPromotor=$promotor->eventos();
        $userFavoritEvents=$eventosPromotor->usuarios()->get();

        if(count($eventosPromotor)==0){
            return abort(404,'O promotor nao esta associado a qualquer evento');
        }else if(count($eventosPromotor)==1) {
            foreach($userFavoritEvents as $userF){
                if($eventosPromotor==$userF){
                    $to=[
                        "usuario"=>$userF
                    ];
                }else{
                    return abort(404,'Usuario nao tem eventos favoritos');

                }

            }

        }else{

            foreach($eventosPromotor as $promotor){

                foreach($userFavoritEvents as $userF){
                    if($promotor==$userF){
                        $to=[
                            "usuario"=>$userF
                        ];
                    }else{
                        return abort(404,'Usuario nao tem eventos favoritos');

                    }

                }
            }
        }

        new Convite($request->view,$request->viewdata);

        if(Mail::to($to)){
            return true;
        }else{
            return false;
        }

    }
}
