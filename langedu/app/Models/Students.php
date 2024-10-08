<?php

namespace App\Models;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = ['username', 'firstname', 'lastname', 'email', 'dob','user_id'];
    
    public function user(){
     return $this->belongsTo(User::class);
    }
    public function lesson(){
    return $this->belongsToMany(Lesson::class,'students_lesson');
    }

    public function getFormattedDobAttribute(){
        return Carbon::parse($this->attributes['dob'])->format('d F Y');
    }
}
