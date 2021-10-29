<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{

    protected $table= 'cities';

    public function location(){
        return $this->hasMany(Locations::class,'city','id');
    }
}
