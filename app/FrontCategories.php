<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FrontCategories extends Model
{
    //

    protected $table="front_categories";
    public $timestamps=true;

    public function parent() {
        return $this->hasMany(static::class, 'id', 'id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class,"parent_id")->with('stream')->orderBy('name');
    }

    public function stream(){
        return $this->hasMany(static::class, 'parent_id', 'id');
    }
}
