<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
 public function index(){
    $students = Students::latest()->get();
    return view('students.students', ['students'=>$students]);
 }
 public function show($id){
    $student = Students::find($id);
    return view('students.showStudent', ['student'=>$student]);
 }
 public function create(){
    return view('students.createStudent');
 }
 public function store(Request $request){
    $request -> validate([
        'username'=> 'required|max:255',
        'firstname'=>'required|max:255',
        'lastname'=>'required|max:255',
        'email'=>'required|max:255|unique:students,email',
        'dob' => 'required|date',
        'is_active'=>'boolean'
    ]);
    return redirect('students');
 }
}
