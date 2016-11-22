<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $fillable = [
        'title', 'location','begin','end','image','descripion','type','category','convidado','partilhado','eventPhoto','likes','coments'
    ];

    public function promotores()
    {

        return $this->belongsToMany('\App\Promotor');

    }


    public function usuarios()
    {

        return $this->belongsToMany('\App\Usuario');

    }

    public function convite()
    {
        return $this->hasone('\App\Convite');
    }
}
