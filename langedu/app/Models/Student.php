<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['username', 'firstname', 'lastname', 'email', 'is_active', 'dob'];
    
    public function user(){
        $this->belongsTo(User::class);
    }
}
