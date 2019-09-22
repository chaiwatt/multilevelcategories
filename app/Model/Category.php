<?php

namespace App\Model;

use App\Model\Category;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['title','parent_id'];

    public function childs() {
        return $this->hasMany(Category::Class,'parent_id','id') ;
    }
}
