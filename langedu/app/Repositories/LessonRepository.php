<?php

namespace App\Repositories;
use App\Models\Lesson;
use Illuminate\Http\Request;



/**
 * Class LessonRepository
 */

 class LessonRepository{
    /**
     * @return string
     */

    public function indexLessons(){
        $lessons = Lesson::latest()->get();
        return view('lessons.indexLessons',['lessons' => $lessons]);
    } 

    public function showLesson($id){
          $lesson = Lesson::find($id);
        return view('lessons.showLesson',['lesson' => $lesson]);
    }

    public function createLesson(){
        return view('lessons.createLesson');
    }
     
    public function storeLesson(Request $request){
           $request->validate([
            'title'=> 'required|max:255',
            'description'=>'required|max:255'
        ]);

        Lesson::create([
            'title'=>$request->input('title'),
            'description'=>$request->input('description')
        ]);

        return redirect()->back();
    }

    public function editLesson($id){
          $editLesson = Lesson::findOrFail($id);
        return view('lessons.editLesson',['editLesson'=>$editLesson]);
    }

    public function updateLesson(Request $request,$id){
        $updateLesson = Lesson::find($id);

        $request -> validate([
            'title'=> 'required|max:255',
            'description'=>'required|max:255'
        ]);
        $updateLesson->update($request->all());
        return redirect()->back();
    }

    public function destroyLesson($id){
  $destroyLesson = Lesson::findOrFail($id);
        $destroyLesson.delete();
        return redirect()->back();
    }

 }