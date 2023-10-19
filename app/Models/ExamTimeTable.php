<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamTimeTable extends Model
{
    use HasFactory;


    public function paper(){
        return $this->belongsTo(SubjectPaper::class,'paper_id');
    }
    public function level(){
        return $this->belongsTo(ClassLevel::class,'level_id');
    }
    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
