<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'nickName'
    ];

    public function evento()
    {
        return $this->belongsTo('App\Evento');
    }




}
