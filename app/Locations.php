<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    //
    protected $table="location";
    public $timestamps=true;

    protected $fillable = [
        'prop_id', 'street_name', 'local_area','nationality','city','state','pincode'
    ];

    public function cities()
    {
        return $this->hasOne('App\CityModel','id','city');
    }

    public function states()
    {
        return $this->hasOne('App\StateModel','id','state');
    }
}
