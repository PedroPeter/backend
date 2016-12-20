<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'mensage', 'type'
    ];

    public function usuario_feedback()
    {
        return $this->hasOne('App\Usuario');
    }
}
