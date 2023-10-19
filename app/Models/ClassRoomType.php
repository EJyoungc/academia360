<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoomType extends Model
{
    //

    protected $fillable = ['name','level_id'];
    public function classrooms()
    {
        
        return $this->hasMany(Classroom::class, 'classroom_type_id');
    }

    public function level(){
        return $this->belongsTo(ClassLevel::class);
    }
}
