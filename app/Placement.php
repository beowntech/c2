<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{

    protected $table = 'placements';
    public $timestamps = true;

    protected $fillable = [
        'property_id', 'featured', 'images','status'
    ];
}
