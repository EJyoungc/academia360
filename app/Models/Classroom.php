<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    //
    protected $fillable =['name','classroom_type_id'];
    public function classroomtype(){
        return $this->belongsTo(ClassRoomType::class,'id');
    }
    public function crt()
    {
        return $this->belongsTo(ClassRoomType::class,'classroom_type_id');
    }


    public function teacher(){
        return $this->belongsTo(User::class,'teacher_id');
    }
}
