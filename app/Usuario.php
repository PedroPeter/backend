<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'apelido', 'name', 'nickName','email','username','phoneNumber','age','genero','birthDate','blocked','password'
    ];

//adicionar um atributo enable na tabela

    public function eventos()
    {
        return $this->belongsToMany('\App\Evento');
    }


    public function comentarios()
    {
        return $this->belongsTo('\App\Comentario');
    }

    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    public function promotor()
    {
        return $this->hasOne('App\Promotor');
    }

    public function notificacoes(){

        return $this->belongsToMany('App\Notificacao');
    }


}
