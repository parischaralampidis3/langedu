<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Students;
class StudentSettings extends Model
{
    use HasFactory;
    protected $table = 'students_settings';

    protected $fillable=[
        'student_id',
        'count_limit_students',
        'limit_students_number'
    ];

    public function student(){
        return $this->belongsTo(Students::class);
    }
}
