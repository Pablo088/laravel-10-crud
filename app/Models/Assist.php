<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assist extends Model
{
    use HasFactory;
    
    public function studentAssist(){
        return $this->belongsTo(Student::class);
    }
}
