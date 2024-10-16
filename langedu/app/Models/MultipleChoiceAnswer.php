<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MultipleChoiceOption;
use App\Models\MultipleChoiceQuestion;

class MultipleChoiceAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'option_id',
        'question_id'
    ];

    public function mc_questions(){
        return $this->belongsTo(MultipleChoiceQuestion::class,'question_id');
    }

    public function mc_options(){
       return $this->belongsTo(MultipleChoiceOption::class, 'option_id');
    } 
}
