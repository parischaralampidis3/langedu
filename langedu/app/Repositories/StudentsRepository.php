<?php

namespace App\Repositories;
use App\Models\Students;
use Illuminate\Http\Request;

/**
 * Class  StudentsRepository
 */

 class StudentsRepository{
    /**
     * @return string
     */

     /**index method */
     public function index(){
          $students = Students::where('user_id', auth()->id())->latest()->get();
        return view('students.indexStudents', ['students'=>$students]);

        if($students){
         if($students->is_suspended){
            $students->is_suspended = True;
         }else{
            $students->isEmpty = False;
         }
         $students->save();
        }
     }
     /**show method */
     public function show($id){
          $student = Students::find($id);

    return view('students.showStudent', ['student'=>$student]);
     }

     /**create method */
     public function create(){
        return view('students.createStudent');
     }
     /**store method*/
     public function store(Request $request){
          $request -> validate([
        'username'=> 'required|max:255',
        'firstname'=>'required|max:255',
        'lastname'=>'required|max:255',
        'email'=>'required|max:255|unique:students,email',
        'dob' => 'required|date',
    ]);
    Students::create([
       'user_id'=>auth()->id(),
       'username' => $request->input('username'),
       'firstname' => $request->input('firstname'),
       'lastname' => $request->input('lastname'),
       'email' => $request->input('email'),
       'dob' => $request->input('dob')
    ]);
    return redirect('dashboard');
     }
     /**edit method */
     public function edit($id){
         $student = Students::findOrFail($id);
    return view('students.editStudent',compact('student'));
     }
    /**update method */
    public function update(Request $request,$id){
            $student = Students::find($id);
    $request ->validate([
         'username'=> 'required|max:255',
        'firstname'=>'required|max:255',
        'lastname'=>'required|max:255',
        'email'=>'required|max:255|unique:students,email',
        'dob' => 'required|date',
    ]);
    $student->update($request->all());

           if($student){
         if($student->is_suspended){
            $student->is_suspended = True;
         }else{
            $student->isEmpty = False;
         }
         $student->save();

    return redirect()->back();
    }
    }

 public function toggleSuspend(Request $request, $id){
  $student= Students::findOrFail($id);
 $student->is_suspended = !$student->is_suspended;
  $student->save();
    return redirect()->route('students.indexStudents')->with('success', 'Student suspension status updated successfully');
 }


     public function destroy($id){
 //$student = Students::find($id);
   $student = Students::withTrashed()->find($id);
   
   if($student->trashed()){
      $student -> forceDelete();
      return redirect('dashboard');
   }
   
   $student->delete();
   $students = Students::all(); 
   return view('students.indexStudents', ['students' => $students]);
     }
 }