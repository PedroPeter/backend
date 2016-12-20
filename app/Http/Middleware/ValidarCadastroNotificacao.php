<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCadastroNotificacao
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
            return app(\App\Http\Middleware\VerificarExistenciaNotificacao::class)->handle($request, function($request) use ($next) {
            $data = $request->json()->all();
            $erro=['error'=>'A Operacao falhou!'];
            if(isset($data['title'])&& isset($data['message']) && isset($data['sender'])){
                $request->{'notificacao'}=$data;
                return $next($request);
            }else{
                return response()->json($erro, 400);
            }
        });

    }
}
