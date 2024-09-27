<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model

{
    use HasFactory;

    protected $table = 'students';
    protected $fillable = ['username', 'firstname', 'lastname', 'email', 'dob'];
    
    public function user(){
     return $this->belongsTo(User::class);
    }
}
