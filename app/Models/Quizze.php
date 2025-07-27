<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quizze extends Model
{
    use HasFactory;

    protected $fillable = ['name','subject_id','college_id','classroom_id','section_id','doctor_id'];


    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }



    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }


    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function degree()
    {
        return $this->hasMany('App\Models\Degree');
    }



}
