<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaUsuario
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
        $usuario_id = $request->route()->parameter('administradors');
        $usuario = \App\Usuario::find($usuario_id);
        if (isset($usuario)) {
            $request->{'usuario'} = $usuario;
            return $next($request);
        } else {
            $erros = [
                'erros' => [
                    'Usuario não encontrado'
                ]
            ];

            return response()->json(['Usuario nao encontrado'],404);
        }

    }
}
