<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    //
    protected $table="exams";
    public $timestamps=true;

    protected $fillable = [
        'exam_id', 'exam_name', 'exam_category','exam_course','exam_description', 'exam_type', 'exam_from_to','exam_application_from_to','exam_result'
    ];

    public function seo()
    {
        return $this->belongsToMany('App\SEO');
    }
    
}
