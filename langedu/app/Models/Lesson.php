<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
                            'title', 
                            'description'
                        ];


    public function students(){
        return $this->belongsToMany(Students::class,'students_lessons','lesson_id','student_id');

    }
}
