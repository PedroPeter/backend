<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable=['path','evento_id'];


public function eventos(){

   return $this->hasMany('App\Evento');
}




}
