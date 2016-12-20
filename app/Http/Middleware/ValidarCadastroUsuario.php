<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCadastroUsuario
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
        if (isset($request->has['apelido']) && isset($request->has['name'])&&isset($request->has['nickName'])&&isset($request->has['email']) &&

            isset($request->has['username'])&&isset($request->has['phoneNumber'])&&isset($request->has['age']) && isset($request->has['genero'])

            && isset($request->has['birthDate'])&&isset($request->has['blocked']) && isset($request->has['password'])) {
                $data = $request->json()->all();
                $request->{'usuario_data'} = $data;
                return $next($request);
        } else {
            $erros = ['Nem todos os dados foram introduzidos. Introduza todos dados!'];
            return response()->json(['erro' => $erros], 400);
        }
    }

}
