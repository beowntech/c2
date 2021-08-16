<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    //
    protected $table="facilities";
    public $timestamps=true;

    public function parent() {
        return $this->belongsToOne(static::class, 'id', 'id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class,"parent_id");
    }
}
