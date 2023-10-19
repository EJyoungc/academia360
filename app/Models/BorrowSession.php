<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowSession extends Model
{
    use HasFactory;

    public function student(){
        return $this->belongsTo(User::class);
    }

    public function days_left(){
        $time = Carbon::parse($this->end_date);
        
        return $time->diffForHumans();
    }

    


}
