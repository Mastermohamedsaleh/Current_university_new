<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;


    public function quizze()
    {
        return $this->belongsTo('App\Models\Quizze');
    }


    public function questionOptions(){
        return $this->hasMany('App\Models\Option','question_id');
    }

}
