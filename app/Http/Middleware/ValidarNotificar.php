<?php

namespace App\Http\Middleware;

use Closure;

class ValidarNotificar
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $data=$request->json()->all();
        $usuarios_id=$data['usuarios'];
        if(isset($usuarios_id)){
            $usuarios= \App\Usuario::findOrFail($usuarios_id);
            $request->{'usuarios'}=$usuarios;
            return $next($request);
        }else{
            return abort(404,"Usuarios nao encontados");
        }

    }
}
