<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicPage extends Model
{
    //

    protected $table="dynamic_page";
    public $timestamps=true;

    protected $fillable = ['id','name','content','logo','featured'];

    public function seo()
    {
        return $this->belongsToMany('App\SEO');
    }
}
