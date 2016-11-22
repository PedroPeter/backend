<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Convite extends Model
{
    protected $fillable = [
        'title','description','sender'];


    public function ususario()
    {
        return $this->belongsTo('App\Usuario');
    }

    public function evento(){

        return $this->belongsTo('\App\Evento');
    }

}
