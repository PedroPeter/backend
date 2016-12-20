<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'title', 'location','begin','end','image','descripion','type','category','artista_id'
    ];

    public function artista(){
        return $this->hasMany('\App\Artista');
    }


    public function usuarios()
    {
        return $this->belongsToMany('\App\Usuario')->withPivot('likes','partilhado','favorito');
    }

    public function postar()
    {
        return $this->belongsTo('\App\Post');
    }

    public function promotores()
    {

        return $this->hasMany('\App\Promotor');

    }


    public function comentarios()
    {
        return $this->belongsTo('\App\Comentario');
    }



    public function convite()
    {
        return $this->hasone('\App\Convite');
    }


}
