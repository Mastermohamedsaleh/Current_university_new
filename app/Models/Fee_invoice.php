<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee_invoice extends Model
{
    use HasFactory;


    protected $fillable = ['invoice_date','student_id','amount','college_id','classroom_id','section_id','fee_id'];

    protected $guard = [];

    public function fee()
    {
        return $this->belongsTo('App\Models\Fee', 'fee_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id');
    }
    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }



}
