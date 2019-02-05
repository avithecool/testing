<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Categories extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'name', 'description','state','ordering'
    ];

    public $sortable = ['id', 'state', 'ordering'];

 public static function getHierarchy(): array
{
    return (new self())->getCategories();
}

private function getCategories(): array
{
    $mainCategories = self::where('parent_id',0)->get();
    foreach ($mainCategories as $category) {
        $this->categories[] = $category->toArray();
        $this->getParentCategories($category, 0);
    }
    return $this->categories;
}

private function getParentCategories($category, $level)
{
    if($subCategories = $category->hasSubCategories) {
        $level++;
        foreach($subCategories as $subCategory) {
            $subCategory->name = str_repeat('-', $level) . $subCategory->name;
            $this->categories[] = $subCategory;
            $this->getParentCategories($subCategory, $level);
        }
    }

}

public function hasSubCategories()
{
    return $this->hasMany($this, 'parent_id');
}

}
