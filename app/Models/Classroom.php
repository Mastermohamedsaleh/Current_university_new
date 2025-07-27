<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;


     protected $table = 'classrooms'; 

    protected $fillable=['name','college_id'];

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id');
    }

    public function section()
    {
        return $this->belongsTo('App\Models\Section', 'section_id');
    }


}
