<?php

namespace App;

use App\Amenities;
use Illuminate\Database\Eloquent\Model;

class CategoryNameModel extends Model
{

    protected $table = 'category_name';
    public $timestamps = true;

    public function parent() {
        return $this->belongsToOne(static::class, 'id', 'id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(Categories::class,"name")->select("id","name");
    }

}
