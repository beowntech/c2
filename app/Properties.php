<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    //
    protected $table = 'properties';
    public $timestamps = true;

    public function parent() {
        return $this->belongsToOne(static::class, 'id', 'id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(ImagesModel::class,"property_id")->select("property_id","featured","images");
    }

    public function childrens() {
        return $this->hasMany(ReviewModel::class,"property_id")->select("property_id","stars","user_id");
    }

    public function seo()
    {
        return $this->belongsToMany('App\SEO');
    }

    public function category()
    {
        return $this->hasMany('App\Categories','id','property_type');
    }

    public function cities()
    {
        return $this->hasMany('App\CityModel','id','city');
    }

    public function courses()
    {
        return $this->hasMany('App\Course','prop_id','id')->with('streams');
    }

    public function states()
    {
        return $this->hasMany('App\StateModel','id','state');
    }

    public function images()
    {
        return $this->hasMany('App\ImagesModel','property_id','id');
    }

    public function reviewCount()
    {
        return $this->hasMany('App\ReviewModel','property_id','id');
    }

    public function location()
    {
        return $this->hasMany('App\Locations', 'prop_id', 'id')->with('cities')->with('states');
    }

    public function seoData()
    {
        return $this->belongsToMany('App\SEO')->wherePivot('confirmed','0');
    }

    public function teachers()
    {
        return $this->hasMany('App\Teacher','prop_id','id');
    }
}
