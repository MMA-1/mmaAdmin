<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post','post_tag');
    }
    public function photo_galleries()
    {
        return $this->belongsToMany('App\PhotoGallery','photogallery_tag');
    }
    public function albums()
    {
        return $this->belongsToMany('App\Album','album_tag');
    }
}
