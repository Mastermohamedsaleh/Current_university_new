<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable=[
        'student_id',
        'college_id',
        'classroom_id',
        'section_id',
        'doctor_id',
        'course_id',
        'attendence_date',
        'attendence_status',
    ];



    public function students()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }


    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
}
