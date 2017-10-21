<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    public function media()
    {
        return $this->hasMany('App\media');
    }
}
