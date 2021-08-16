<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    protected $table="categories";
    public $timestamps=true;

    public function parent() {
        return $this->hasMany(static::class, 'id', 'id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class,"parent_id");
    }
}
