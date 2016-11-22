<?php

namespace App\Http\Middleware;

use Closure;

class VerificarExistenciaAdmin
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
            $admin_id = $request->route()->parameter('admins');
            $admin = \App\Admin::where('id', $admin_id);
            if (isset($admin)) {
                $request->{'admin'} = $admin;
                return $next($request);
            } else {
                abort(404);
            }
        });
    }
}
