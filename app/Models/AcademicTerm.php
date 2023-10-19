<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AcademicTerm extends Model
{
    //
    protected $fillable =['start_date','end_date','name','academic_year_id'];

    public function academic_year(){
        return $this->belongsTo(AcademicYear::class,'academic_year_id');
    }
    public function yearonly($data){
        $date =Carbon::parse($data);


        return $date->year; //$this->start_date
    }

    public function payment(){
        return $this->hasOne(Payment::class,'academic_term_id');
    }

    public function total($data){
        $bsum =0;
        $sum =0;
        foreach($data as $item){
            $sum +=(int)$item->amount;


        }

        return $sum;

    }

    public function subtrac($n, $n2)
    {
        return $n - $n2;
    }
}
