<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultipleChoiceQuestion;
use App\Models\MultipleChoiceOption;


class MultipleChoiceExerciseController extends Controller
{

    //index mc questions 
    public function indexMcQuestions(){
        $mcChoiceQuestion = MultipleChoiceQuestion::latest()->get();
        return view('questions.mcQuestions',['mcChoiceQuestion' => $mcChoiceQuestion]);
    }

    //index mc questions combined with options

}
