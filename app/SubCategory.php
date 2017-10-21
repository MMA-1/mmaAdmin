<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'subcategories';
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function albums()
    {
        return $this->hasMany('App\Album');
    }
}