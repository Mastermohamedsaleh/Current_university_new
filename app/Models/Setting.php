<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected  $fillable = ['unvirsty_name','phone','address','logo','email','link_facebook','link_linked_in','link_youtube'] ;
  
}
