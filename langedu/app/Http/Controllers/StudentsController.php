<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Students;
class StudentsController extends Controller
{
 public function index(){
    $students = Students::latest()->get();
    return view('students.indexStudents', ['students'=>$students]);
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
    ]);
    Students::create([
       'username' => $request->input('username'),
       'firstname' => $request->input('firstname'),
       'lastname' => $request->input('lastname'),
       'email' => $request->input('email'),
       'dob' => $request->input('dob')
    ]);
    return redirect('dashboard');
 }

 public function edit($id){
    $student = Students::findOrFail($id);
    return view('students.editStudent',compact('student'));
 }

 public function update(Request $request, $id){
    $student = Students::find($id);
    $request ->validate([
         'username'=> 'required|max:255',
        'firstname'=>'required|max:255',
        'lastname'=>'required|max:255',
        'email'=>'required|max:255|unique:students,email',
        'dob' => 'required|date',
    ]);

    $student->update($request->all());
    return redirect()->back();
 }

 public function destroy(Request $request, $id){
   $student = Students::find($id);
   $student->delete();
   $students = Students::all(); 
   return view('students.indexStudents', ['students' => $students]);

 }
}
