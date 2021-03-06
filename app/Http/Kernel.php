<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verificar_existencia_usuario' => \App\Http\Middleware\VerificarExistenciaUsuario::class ,
        'validar_usuario' => \App\Http\Middleware\ValidarCadastroUsuario::class ,
        'validar_feedback' => \App\Http\Middleware\ValidarCadastroFeedback::class ,
        'validar_edicao_usuario' => \App\Http\Middleware\VAlidarUpdateUsuario::class ,
        'verificar_existencia_evento' => \App\Http\Middleware\VerificarExistenciaEvento::class ,
        'validar_evento' => \App\Http\Middleware\ValidarCadastroEvento::class ,
        'validar_edicao_evento' => \App\Http\Middleware\ValidarUpdateEvento::class ,
        'verificar_existencia_admin' => \App\Http\Middleware\VerificarExistenciaAdmin::class ,
        'verificar_existencia_artista' => \App\Http\Middleware\VerificarExistenciaArtista::class ,
        'verificar_existencia_notificacao' => \App\Http\Middleware\VerificarExistenciaNotificacao::class ,
        'validar_criacao_admin' => \App\Http\Middleware\ValidarCadastroAdmin::class ,
        'validar_artista' => \App\Http\Middleware\ValidarCadastroArtista::class ,
        'validar_notificacao' => \App\Http\Middleware\ValidarCadastroNotificacao::class ,
        'validar_edicao_admin' => \App\Http\Middleware\ValidarUpdateAdmin::class ,
        'validar_edicao_artista' => \App\Http\Middleware\ValidarUpdateArtista::class ,
        'validar_edicao_notificacao' => \App\Http\Middleware\ValidarUpdateNotificacao::class ,
        'verificar_existencia_promotor' => \App\Http\Middleware\VerificarExistenciaPromotor::class ,
        'validar_promotor' => \App\Http\Middleware\ValidarCadastroPromotor::class ,
        'validar_edicao_promotor' => \App\Http\Middleware\ValidarUpdatePromotor::class ,
        'validar_envio_convite' => \App\Http\Middleware\ValidarEnvioConvite::class ,
        'validar_evento_favorito' => \App\Http\Middleware\ValidarEventoFavorito::class ,
        'validar_notificar' => \App\Http\Middleware\ValidarNotificar::class ,
    ];
}
