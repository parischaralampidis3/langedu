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
        $request -> validate([
            'question_title'=> 'required|max:255',
        ]);
         MultipleChoiceQuestion::create([
             'question_title'=>$request->input('question_title')
         ]);
        return redirect()->back()->with('success', 'Mc Question has been created');
    }

    //store mc options
public function storeMcOptions(Request $request, $id) {
    // Validate incoming request data
    $McOption = $request->validate([
        'option_text' => 'required|max:255',
        'is_correct' => 'required|boolean'
    ]);

    // Find the related question
    $question = MultipleChoiceQuestion::findOrFail($id);

    // Create a new instance of MultipleChoiceOption using the validated data
    $option = new MultipleChoiceOption($McOption);

    // Save the option related to the question
    $question->mc_options()->save($option);

    // Redirect back with a success message
    return redirect()->back()->with('success', 'Mc Options has been created');

}



}
