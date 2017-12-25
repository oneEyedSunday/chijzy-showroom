<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    public function media(){
    	return $this->hasMany('App\Media');
    }

     public function tags(){
      return $this->belongsToMany('App\Tag');
    }
}
