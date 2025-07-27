<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ViewAssignment extends Model
{
    use HasFactory;

    public function Course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function assignment()
    {
        return $this->belongsTo('App\Models\Assignment', 'assignment_id');
    }

}
