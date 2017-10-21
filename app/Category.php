<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
    public function subcategories()
    {
        return $this->hasMany('App\SubCategory');
    }

}
