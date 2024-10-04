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

    public function show(){
    
    }

    public function create(){

    }

    public function store(){

    }  //
}
