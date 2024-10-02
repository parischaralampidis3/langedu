<?php

namespace App\Models;
use App\Models\Students;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    public function students(){
        return $this->belongsToMany(Students::class,'students_lesson');
    }
}
