<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\StudentSettings;

class StudentsSettingsController extends Controller
{
    public function toggleLimitStudent(Request $request, $id){
        $toggleStudent = Students::findOrFail($id);
  
        $studentSetting = $toggleStudent->studentSettings;
      
            $request->validate([
                'count_limit_students' => 'boolean',
                'limit_students_number'=> 'required|integer|min:1'
            ]);

            StudentSettings::create([
                'student_id' => $toggleStudent->id,
                'count_limit_students' => $request->input('count_limit_students'),
                'limit_students_number' => $request ->input('limit_students_number')
            ]);

         if(!$studentSetting){ 
               return response()->json(['message' => 'Settings have not updated successfully'],404);
         }
        
        if($studentSetting){
            $studentSetting-> count_limit_students = $request->input('count_limit_students');
            $studentSetting-> limit_students_number = $request->input('limit_students_number');
            $studentSetting->save();

            return response()->json(['message' => 'Settings updated successfully'],200);
        }
 
    }
}
