<?php

namespace App\Http\Controllers;
use App\Models\Students;
use App\Models\Lesson;

use Illuminate\Http\Request;

class StudentsLessonController extends Controller
{
    public function index(){
        $enrollStudents = Students::has('lessons')->get();
        return view('enroll.index',['enrollStudents' => $enrollStudents]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'student_id' => 'required,max:255',
            'lesson_id' => 'required,max:255'
        ]);

        $student = Students::find($validated['student_id']);
        $lesson = Lesson::find($validated['lesson_id']);

        $student->lessons()->attach($lesson->id);

        return redirect()->back()->with('success','Student has Enrolled Successfully');

    }  //
}
