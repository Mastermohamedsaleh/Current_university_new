<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

      protected $fillable = ['name','classroom_id','college_id','status'];


    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom', 'classroom_id');
    }

    public function college()
    {
        return $this->belongsTo('App\Models\College', 'college_id');
    }


}
