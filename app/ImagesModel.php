<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesModel extends Model
{

    protected $table = 'images';
    public $timestamps = true;

    protected $fillable = [
        'property_id', 'featured', 'images','status'
    ];
}
