<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $fillable = [
        'title', 'message','vista'
    ];

    public function ususario()
    {
        return $this->belongsTo('App\Usuario');
    }
}
