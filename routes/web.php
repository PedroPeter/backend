<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
$read_write = [
    'only' => ['index', 'show', 'store', 'destroy', 'update']
];


Route::group(['prefix' => 'dashboard'],function(){
    $read_write = [
        'only' => ['index', 'show', 'store', 'destroy', 'update']
    ];
    //Routas para  administardor
    Route::resource('administradors','AdminController',$read_write);
    Route::get('adicionarPromotor/{promotor}', 'AdminController@addPromotor',$read_write);
    Route::get('removerPromotor/{promotor}', 'AdminController@removePromotor',$read_write);
    Route::get('bloquearUsuario/{usuario}', 'AdminController@blockUsuario',$read_write);
    Route::get('isUsuarioBlocked/{usuario}', 'UsuarioController@isBlocked',$read_write);


    //Routas para  Promotor
    Route::resource('promotores','PromotorController',$read_write);
    Route::get('adicionarArtistaAoEvento/{artista}/{evento}', 'ArtistaController@addEvento');
    Route::get('enviarConvites/{viewName}/{promotor}', 'PromotorEventoController@enviarConvites');
    //Routas para  usuario
    Route::resource('usuarios','UsuarioController',$read_write);
    Route::post('usuario/eventoFavorito/eventos', 'PromotorEventoController@enviarConvites');
    Route::put('notificar/{notificacao}', 'NotificacaoController@notificar');



});



Route::group(['prefix' => 'eventos'], function () {

    $read_write = [
        'only' => ['index', 'show', 'store', 'destroy', 'update']
    ];

    //Routas para  artista
    Route::resource('artistas','ArtistaController',$read_write);

//Routas para  convite
    Route::resource('convites','ConviteController',$read_write);

//Routas para  evento
    Route::resource('eventos','EventoController',$read_write);




});

//Routas para  usuario + evento
Route::post('eventos/usuario/like','UsuarioEventoController@like');
Route::get('eventos/usuario/coment','UsuarioEventoController@coment');


//Routas para  feedback
Route::resource('feedbacks','FeedbackController@index');
Route::resource('feedbacks','FeedbackController@store');
Route::resource('feedbacks','FeedbackController@show');
Route::post('feedbacks','FeedbackController@send');
Route::post('feedbacks/enviarConvite', 'PromotorEventoController@enviarConvites');


//Routas para  Notificacao
Route::resource('notificacoes','NotificacaoController',$read_write);
Route::post('notificacoes','NotificacaoController@notificar');


/*//Routas para  guest
Route::resource('guests','GuestController',$read_write);*/


Route::group(['prefix' => 'share'], function (){
    Route::get('twitter', function()
    {
        return Share::load('http://www.txilling.com', 'My example')->twitter();
    });
    Route::get('facebook', function()
    {
        return Share::load('http://www.txilling.com', 'My example')->facebook();
    });
    Route::get('gmail', function()
    {
        return Share::load('http://www.txilling.com', 'My example')->gmail();
    });
    Route::get('linkedin', function()
    {
    return Share::load('http://www.txilling.com', 'My example')->linkedin();
    });


});


