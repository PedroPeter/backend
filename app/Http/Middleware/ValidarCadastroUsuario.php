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
        $data = $request->json()->all();

        if (isset($data['nome']) && isset($data['nome'])&&isset($data['nome'])&&isset($data['nome']) &&

            isset($data['nome'])&&isset($data['nome'])&&isset($data['nome'])&&isset($data['nome']) &&

            isset($data['nome']) && isset($data['nome']) && isset($data['nome'])&& isset($data['nome']) &&

            isset($data['nome']) && isset($data['nome'])) {

                $request->{'usuario_data'} = $data;
                return $next($request);

        } else {
            $erros = ['Nem todos os dados foram introduzidos!'];
            return response()->json(['erros' => $erros], 400);
        }
    }

}
