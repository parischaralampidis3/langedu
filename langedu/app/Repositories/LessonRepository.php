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

        return redirect('dashboard');
    }

    public function editLesson($id){
          $lesson = Lesson::findOrFail($id);
        return view('lessons.editLesson',['lesson'=>$lesson]);
    }

    public function updateLesson(Request $request,$id){
        $lesson = Lesson::find($id);

        $request -> validate([
            'title'=> 'required|max:255',
            'description'=>'required|max:255'
        ]);
        $lesson->update($request->all());
        return redirect()->back();
    }

    public function destroyLesson($id){
  $lesson = Lesson::find($id);
        $lesson->delete();
        $lessons = Lesson::all();
        return view('lessons.indexLessons',['lessons'=>$lessons]);
    }

 }