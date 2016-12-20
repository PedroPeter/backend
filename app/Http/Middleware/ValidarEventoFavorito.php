<?php

namespace App\Http\Middleware;

use Closure;

class ValidarEnvioConvite
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
        $all=$request->json()->all();
        If(isset($all['usuario'])&& isset($all['evento'])){
            $request->{'usuario'}=$all['usuario'];
            $request->{'evento'}=$all['evento'];
            return $next($request);

        }else{
            return abort(404,"Usuario ou eventos nao encontados");
        }
    }
}
