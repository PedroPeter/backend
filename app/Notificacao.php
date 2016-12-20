<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notificacao extends Model
{
    protected $fillable = [
        'title', 'message','vista','sender'
    ];

    public function usuario()
    {
        return $this->belongsToMany('App\Usuario')->withPivot('notificacao');
    }
}
