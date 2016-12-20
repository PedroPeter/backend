<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaPromotor
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
            $promotor_id = $request->route()->parameter('promotore');
            $promotor = \App\Promotor::where('id', $promotor_id);
            if (isset($promotor)) {
                $request->{'promotor'} = $promotor;
                return $next($request);
            } else {
                abort(404);
            }
        });
    }
}
