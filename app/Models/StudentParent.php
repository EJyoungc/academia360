<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;

    

    public function parent()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
    
}
