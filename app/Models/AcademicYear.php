<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //
    protected $fillable = ['start_date','end_date','is_current'];

    public function yearonly($data)
    {
        $date = Carbon::parse($data);
        return $date->year; //$this->start_date
    }
}
