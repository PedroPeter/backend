<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaNotificacao
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

            $notificacao_id = $request->route()->parameter('notificacaoes');
            $notificacao = \App\Notificacao::where('id', $notificacao_id);
            if (isset($notificacao)) {
                $request->{'notificacao'} = $notificacao;
                return $next($request);
            } else {
                abort(404);
            }

    }
}
