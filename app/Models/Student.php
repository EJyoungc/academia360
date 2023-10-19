<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $fillable = ['name','dob','gender','parent_id','cover'];


   
    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

}
