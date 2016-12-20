<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{

    public function __construct(){
        $this->middleware('validar_feedback', ['only'=>['send','store']]);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedback = \App\Feedback::all();
        if (count($feedback) > 0) {
            $feedback_obj = [
                'feedback' => $feedback
            ];
            return $feedback_obj;
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
        $feedback = $request->feedback;
        $feedback_data = $request->feedback_data;
        $feedback=\App\Feedback::create($feedback_data);
        $usuario=$request->usuario;
        $feedback->usuario_feedback()->create($usuario);
        $feedback->save();
        return $feedback;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $feedback= \App\Feedback::findOrFail($id);
        return $feedback;
    }

    /**
     * Send a newly created resource in storage to admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function send(Request $request)
    {
        $admin=\App\Admin::get()->first();
        $to=$admin->email;
        $feedback= $request->feedback_data;
        $feedback= \App\Feedback::save($feedback);
        Mail::to($to)->send(new Mail($feedback));

    }

}
