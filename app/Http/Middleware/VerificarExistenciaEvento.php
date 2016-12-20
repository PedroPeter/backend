<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaEvento
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
        $evento = \App\Evento::findOrFail($evento_id);

        if (isset($evento)) {
            $request->{'evento'} = $evento;
            return $next($request);
        } else {
            $erros = [
                'erros' => [
                    'Evento não encontrado'
                ]
            ];

            return response($erros, 404);
        }

    }
}
