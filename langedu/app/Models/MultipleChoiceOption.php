<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MultipleChoiceQuestion;
class MultipleChoiceOption extends Model
{
    use HasFactory;
    protected $fillable = [
        'option_text',
        'option_id',
        'is_correct'
    ];
    protected $table = 'mc_options';
    
    public function mc_questions(){
        return $this->belongsTo(MultipleChoiceQuestion::class, 'question_id');
    }

    public function mc_answers() {
    return $this->hasMany(MultipleChoiceAnswer::class);
}
    
}
