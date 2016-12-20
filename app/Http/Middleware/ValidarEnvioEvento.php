<?php

namespace App\Http\Middleware;

use Closure;

class ValidarEventoFavorito
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
        $evento_id = $request->route()->parameter('evento');
        $usuario_id = $request->route()->parameter('usuario');
        $evento = \App\Evento::find($evento_id);
        $usuario = \App\Usuario::find($evento_id);

        if (isset($evento) && isset($evento)) {
            $request->{'evento'} = $evento;
            $request->{'usuario'} = $usuario;
            return $next($request);
        } else {
            $erros = [
                'erros' => [
                    'Evento ou usuario não encontrados'
                ]
            ];

            return response($erros, 404);
        }

    }
}
