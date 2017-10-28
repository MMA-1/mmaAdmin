<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory');
    }
    public function media()
    {
        return $this->hasMany('App\media');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
