<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Location;

class StateModel extends Model
{

    protected $table= 'states';

    public function location(){
        return $this->hasMany(Locations::class,'state','id');
    }
}
