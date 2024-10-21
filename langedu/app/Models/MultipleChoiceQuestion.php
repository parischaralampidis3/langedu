<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MultipleChoiceOption;
use App\Models\MultipleChoiceAnswer;

class MultipleChoiceQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['question_title'];
    protected $table = 'ms_questions';
    public function mc_options(){
        return $this->hasMany(MultipleChoiceOption::class,'mc_options');
    }

     public function mc_answers() {
        return $this->hasMany(MultipleChoiceAnswer::class);
    }


}
