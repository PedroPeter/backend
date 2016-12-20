<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable=['comentario','evento_id','usuario_id'];


    public function eventos(){

        return $this->belongsTo('App\Evento');
    }

    public function eventoComentarios()
    {
        return $this->hasMany('\App\Evento');
    }

    public function UsuarioComentarios()
    {
        return $this->hasMany('\App\Usuario');
    }

}
