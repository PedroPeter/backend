<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaArtista
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

            $artista_id = $request->route()->parameter('artista');
            $artista = \App\Artista::where('id', $artista_id);
            if (isset($artista)) {
                $request->{'artista'} = $artista;
                return $next($request);
            } else {
                abort(404);
            }

    }
}
