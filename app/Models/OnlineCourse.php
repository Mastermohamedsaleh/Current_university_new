<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OnlineCourse extends Model
{
    use HasFactory;

    public $fillable= ['college_id','classroom_id','section_id','course_id','doctor_id','meeting_id','topic','start_at','duration','password','start_url','join_url'];

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }


    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id');
    }

}
