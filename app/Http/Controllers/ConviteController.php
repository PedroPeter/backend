<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConviteController extends Controller
{
    public function __construct(){
        $this->middleware('validar_convite', ['only'=>['store']]);
        $this->middleware('validar_edicao_convite', ['only' => ['update']]);
        $this->middleware('verificar_existencia_convite', ['only' => ['destroy', 'show']]);
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
}
