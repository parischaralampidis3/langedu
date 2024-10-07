<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Lesson;

use Illuminate\Http\Request;

class StudentsLessonController extends Controller
{
    public function index(){
        $enrollStudents = Students::has('lessons')->get();
        return view('students.enrollStudent',['enrollStudents' => $enrollStudents]);
    }

  

    public function store(Request $request){
        $validated = $request->validate([
            'student_id' => 'required,max:255',
            'lesson_id' => 'required,max:255'
        ]);

        $student = Students::find($validated['student_id']);
        $lesson = Lesson::find($validated['lesson_id']);

        if($student->lessons()->where('lesson_id',$lesson->id)->exists()){
            return redirect()->back()->with('error','Student is already enrolled in this lesson.');
        }

        $student->lessons()->attach($lesson->id);

        return redirect()->back()->with('success','Student has Enrolled Successfully');

    }  //
}
