<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function media(){
      return $this->belongsToMany('App\Media','media_tag', 'tag_id','media_id');
    }

    public function albums(){
    	return $this->belongsToMany('App\Album', 'album_tag', 'tag_id', 'album_id');
    }
}
