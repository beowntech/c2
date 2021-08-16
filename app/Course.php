<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FrontCategories;

class Course extends Model
{
    //

    public $timestamps=true;
    protected $table="courses";

    public function catg() {
        return $this->hasMany(FrontCategories::class,"id","category");
    }

    public function streams() {
        return $this->hasMany('App\FrontCategories',"id","stream");
    }

    public function substream() {
        return $this->hasMany(FrontCategories::class,"id","sub_stream");
    }
}
