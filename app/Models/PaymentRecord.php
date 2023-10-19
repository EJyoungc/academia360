<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;


    protected $fillable =[
            'payment_id',
            'date',
            'payment_type',
            'amount',
            'transaction_id',
            'student_id',
            'parent_id',
    ];


    public function total($collection){
        $t = $this->pay_records;
        $sum = 0;
        foreach ($t as $i) {
            $sum += $i->amount;
        }

        return $sum;
    }
}
