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

    public function showMcQuestion($id){
        $showMcQuestion = MultipleChoiceQuestion::with('mc_options')->findOrFail($id);   
        return view('questions.showmcQuestion',['showMcQuestion' => $showMcQuestion]); 
    }

    //create method
    public function create($id){
        return view('questions.createMcQuestion');
    }

    //store mc questions
    public function storeMcQuestion(Request $request){
        
    }

    //store mc options

    


}
