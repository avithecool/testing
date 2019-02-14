<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fileversions extends Model
{
    //
    public function File()
    {
        return $this->belongsTo('App\File');
    }

}
