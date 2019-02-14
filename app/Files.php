<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Files extends Model
{
    //
    use Sortable;
    protected $guarded = [];

    public function Fileversions()
    {
        return $this->hasMany('App\Fileversions');
    }
}
