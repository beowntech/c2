<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cyber extends Model
{
    //
    protected $table="cyber_leads";
    public $timestamps=true;

    public function college()
    {
        return $this->hasOne('App\Properties','id','interested_college');
    }
}
