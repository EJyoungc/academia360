<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['name','academic_term_id','amount','academic_year_id','classtype_id','desc'];


    public function term(){
        return $this->belongsTo(AcademicTerm::class,'academic_term_id');
    }
    public function ay()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
    public function classroomtype()
    {
        return $this->belongsTo(ClassRoomType::class, 'classtype_id');
    }

    public function pay_records(){
       return $this->hasMany(PaymentRecord::class,'payment_id');
    }

    public function total(){
        $t = $this->pay_records;
        $sum = 0;
        foreach($t as $i){
           $sum += $i->amount;
        }

        return $sum;

    }

    public function total2($col)
    {

        $sum = 0;
        foreach ($col as $i) {
            $sum += $i->amount;
        }

        return $sum;
    }
    public function yearonly($data)
    {
        $date = Carbon::parse($data);


        return $date->year;
    }
}
