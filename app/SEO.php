<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    //
    public $timestamps=true;
    protected $table="seo";

    protected $fillable = ['id', 'title', 'permalink'];

    public function property()
    {
        return $this->belongsToMany('App\Properties');
    }

    public function tales()
    {
        return $this->belongsToMany('App\Tales');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Exam');
    }

    public function pages()
    {
        return $this->belongsToMany('App\PagesModel');
    }

    public function dynamic()
    {
        return $this->belongsToMany('App\DynamicPage');
    }
}
