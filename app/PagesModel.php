<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PagesModel extends Model
{
    //
    protected $table="page_content";
    public $timestamps=true;

    public function resolveChildRouteBinding($childType, $value, $field)
    {
        // TODO: Implement resolveChildRouteBinding() method.
    }

    public function seo()
    {
        return $this->belongsToMany('App\SEO');
    }
}
