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
    public function indexLessons(){
    $lessons = $this->lessonRepository->indexLessons();
    return $lessons;
    }

    //show method
    public  function showLesson($id){
      $lesson = $this->lessonRepository->showLesson($id);
      return $lesson;
    }

    //create method
    public function createLesson(){
        $createLesson = $this->lessonRepository->createLesson();
        return $createLesson;
    }

    //store method
    public function storeLesson(Request $request){
     $storeLesson = $this->lessonRepository->storeLesson($request);
     return $storeLesson;
    }
    //edit method
    public function editLesson($id){
      $editLesson = $this-> lessonRepository->editLesson($id);
      return $editLesson;
    }

    public function updateLesson(Request $request, $id){
        $updateLesson = $this-> lessonRepository->updateLesson( $request, $id);
        return $updateLesson;
    }
    //destroy method

    public function destroyLesson($id){
      $destroyLesson = $this->lessonRepository->destroyLesson($id);
      return $destroyLesson;
    }

}
