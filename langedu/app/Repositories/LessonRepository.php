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

    public function index(){
        $lessons = Lesson::latest()->get();
        return view('lessons.indexLessons',['lessons' => $lessons]);
    } 

    public function show($id){
          $lesson = Lesson::find($id);
        return view('lessons.showLesson',['lesson' => $lesson]);
    }

    public function create(){
        return view('lessons.createLesson');
    }
     
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

    public function edit($id){
          $editLesson = Lesson::findOrFail($id);
        return view('lessons.editLesson',['editLesson'=>$editLesson]);
    }

    public function update(Request $request,$id){
        $updateLesson = Lesson::find($id);

        $request -> validate([
            'title'=> 'required|max_length:255',
            'script'=>'required|max_length:255'
        ]);
        $updateLesson->update($request->all());
        return redirect()->back();
    }

    public function destroy($id){
  $destroyLesson = Lesson::findOrFail($id);
        $destroyLesson.delete();
        return redirect()->back();
    }

 }