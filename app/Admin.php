<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{

    public function usuario()
    {
        return $this->hasOne('App\Usuario');
    }
}
