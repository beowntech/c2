<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    //
    protected $table="hostel";
    public $timestamps=true;

    protected $fillable = [
        'prop_id', 'male_female', 'html','price'
    ];
}
