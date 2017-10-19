<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    public function tags()
    {
        return $this->belongsToMany('App\Tag','photogallery_tag','gallery_id','tag_id');
    }
}
