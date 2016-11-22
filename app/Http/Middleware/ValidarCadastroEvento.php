<?php

namespace App\Http\Middleware;

use Closure;

class ValidarCadastroEvento
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

        if (isset($data['title']) && isset($data['location'])&&isset($data['begin'])&&isset($data['end']) &&

            isset($data['image'])&&isset($data['descripion'])&&isset($data['type'])&&isset($data['promotor']) &&

            isset($data['category']) && isset($data['convidado']) && isset($data['partilhado'])&& isset($data['eventPhoto']) &&

            isset($data['likes']) && isset($data['coments'])) {

                $request->{'evento_data'} = $data;
                return $next($request);

        } else {
            $erros = ['Nem todos os dados foram introduzidos!'];
            return response()->json(['erros' => $erros], 400);
        }
    }

}
