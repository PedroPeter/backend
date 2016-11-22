<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'mensage', 'type'
    ];

    public function guests_feedback()
    {
        return $this->belongsTo('App\Guest');
    }
    public function usuarios_feedback()
    {
        return $this->belongsTo('App\Usuario');
    }
}
