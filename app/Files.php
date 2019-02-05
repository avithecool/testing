<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Files extends Model
{
    //
    use Sortable;
    protected $guarded = [];
}
