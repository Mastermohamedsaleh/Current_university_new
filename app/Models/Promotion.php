<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;


    // protected $guarded=[];
    protected $fillable = ['student_id','from_college','from_classroom','from_section','to_college','to_classroom_id','to_section_id','academic_year','academic_year_new'];



    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }


    public function f_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'from_classroom');
    }


    public function f_section()
    {
        return $this->belongsTo('App\Models\Section', 'from_section');
    }


    public function f_college()
    {
        return $this->belongsTo('App\Models\College', 'from_college');
    }

    public function t_classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'to_classroom_id');
    }

    public function t_section()
    {
        return $this->belongsTo('App\Models\Section', 'to_section_id');
    }

    public function t_college()
    {
        return $this->belongsTo('App\Models\College', 'to_college');
    }














}
