<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tales extends Model
{
    //
    public $timestamps="true";
    protected $table="tales";

    public function seo()
    {
        return $this->belongsToMany('App\SEO');
    }
//    public function category()
//    {
//        return $this->hasMany('App\Categories','id','type');
//    }
    public function stat()
    {
        return $this->hasMany('App\Status','id','status');
    }
}
