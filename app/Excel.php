<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excel extends Model
{
    //
    protected $table="excel";
    public $timestamps=true;

    protected $fillable=['student_name','email','phone','district','state','subject_1'
        ,'subject_2','subject_3','subject_4','subject_5','subject_6'
    ,'fathers_name','school','source'];
}
