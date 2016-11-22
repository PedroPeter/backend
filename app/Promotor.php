<?php

namespace App;


class Promotor extends Usuario
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address', 'city', 'type',
    ];


    public function usuario()
    {
        return $this->belongsTo('App\Usuario');
    }


    public function eventos()
    {

        return $this->belongsToMany('\App\Evento');

    }
}
