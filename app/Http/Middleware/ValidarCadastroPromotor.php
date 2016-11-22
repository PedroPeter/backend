<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCadastroPromotor
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
        return app(\App\Http\Middleware\VerificarExistenciaUsuario::class)->handle($request, function($request) use ($next) {
            $data = $request->json()->all();
            $erro=['error'=>'A Opetacao falhou!'];
            if(isset($data['address']) && isset($data['city']) && isset($data['type'])){
                $request->{'promotor_data'} = $data;
                return $next($request);
            }else{
                return response()->json($erro, 400);
            }

        });
    }
}
