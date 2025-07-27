<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialQuiz extends Model
{
    use HasFactory;




    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function quiz()
    {
        return $this->belongsTo('App\Models\Quizze', 'quizze_id');
    }


    public function degree()
    {
        return $this->hasMany('App\Models\Degree');
    }

}
