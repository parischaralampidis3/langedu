<?php

namespace App\Models;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'students';
    protected $fillable = [
                            'username', 
                            'firstname', 
                            'lastname', 
                            'email', 
                            'dob',
                            'user_id',
                            'is_suspended'
                        ];

    public function lessons(){
        return $this->belongsToMany(Lesson::class,'students_lessons');
    }

    public function user(){
     return $this->belongsTo(User::class);
    }
   
    public function getFormattedDobAttribute(){
        return Carbon::parse($this->attributes['dob'])->format('d F Y');
    }
}
