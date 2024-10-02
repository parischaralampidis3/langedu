<?php

namespace App\Http\Controllers;
use App\Repositories\LessonRepository;
use App\Models\Lesson;
use Illuminate\Http\Request;


class LessonController extends Controller
{
    private $lessonRepository;
    
    public function __construct(LessonRepository $lessonRepository){
        $this -> lessonRepository = $lessonRepository;
    }
    //index method
    public function index(){
    $lessons = $this->lessonRepository->index();
    return $lessons;
    }

    //show method
    public  function show($id){
      $lesson = $this->lessonRepository->show($id);
      return $lesson;
    }

    //create method
    public function create(){
        $createLesson = $this->lessonRepository->create();
        return $createLesson;
    }

    //store method
    public function store(Request $request){
     $storeLesson = $this->lessonRepository->store($request);
     return $storeLesson;
    }
    //edit method
    public function edit($id){
      $editLesson = $this-> lessonRepository->edit($id);
      return $editLesson;
    }

    public function update(Request $request, $id){
        $updateLesson = $this-> lessonRepository->update( $request, $id);
        return $updateLesson;
    }
    //destroy method

    public function destroy($id){
      $destroyLesson = $this->lessonRepository->destroy($id);
      return $destroyLesson;
    }

}
