<?php

namespace App\Http\Controllers;
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    //index method
    public function index(){
        $lessons = Lesson::latest()->get();
        return view('lessons.indexLessons',['lessons' => $lessons]);
    }

    //show method
    public  function show($id){
        $lesson = Lesson::findOne($id);
        return view('lessons.showLesson',['lesson' => $lesson]);
    }

    //create method

    public function create(){
        return view('lessons.createLesson');
    }

    //store method
    public function store(Request $request){
        $request->validate([
            'title'=> 'required|max_length:255',
            'script'=>'required|max_length:255'
        ]);

        Lesson::create([
            'title'=>$request->input('title'),
            'script'=>$request->input('script')
        ]);

        return redirect()->back();
    }
    //edit method
    public function edit($id){
        $editLesson = Lesson::findOrFail($id);
        return view('lessons.editLesson',['editLesson'=>$editLesson]);
    }
    //destroy method

    public function destroy($id){
        $destroyLesson = Lesson::findOrFail($id);
        $destroyLesson.delete();
        return redirect()->back();
    }

}
