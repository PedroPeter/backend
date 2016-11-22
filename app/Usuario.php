<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable = [
        'apelido', 'nome', 'nickName','email','username','phoneNumber','age','genero','birthDate','eventoFavorito','lastTimeOnline','blocked'
    ];

//adicionar um atributo enable na tabela

    public function eventos()
    {

        return $this->belongsToMany('\App\Evento');

    }

    public function admin()
    {
        return $this->hasOne('App\Admin');
    }
    public function promotor()
    {
        return $this->hasOne('App\Promotor');
    }


}
