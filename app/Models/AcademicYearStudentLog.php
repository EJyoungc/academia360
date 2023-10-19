<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AcademicYearStudentLog extends Model
{
    //

    protected $fillable = [
            'student_id',
            'classroom_id',
            'academic_year_id',
            'status'
    ];

    public function academicyear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function yearonly($data)
    {
        $date = Carbon::parse($data);
        return $date->year; //$this->start_date
    }

    public function student(){
        return $this->belongsTo(User::class,'student_id');
    }

}
