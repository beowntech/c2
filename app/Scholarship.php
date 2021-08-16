<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{

    protected $table = "scholarship";
    public $timestamps = true;

    protected $fillable = [
        'prop_id', 'content'
    ];

    public function statuse()
    {
        return $this->hasMany('App\Status','id','status');
    }
}
