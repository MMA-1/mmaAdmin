<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function artist()
    {
        return $this->belongsTo('App\Artist');
    }
    public function album()
    {
        return $this->belongsTo('App\Album');
    }
    public function mediatype()
    {
        return $this->belongsTo('App\MediaType');
    }
}
