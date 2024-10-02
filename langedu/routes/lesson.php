<?php
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;
//Lesson routes
//index routes
Route::get('lessons',[LessonController::class,'index'])->name('lessons.indexLessons');
Route::get('lesson/{lesson:id}',[LessonController::class,'show'])->name('lessons.showLesson');
//create routes
Route::get('/create',[LessonController::class,'create'])->name('lessons.createLesson');
Route::post('create',[LessonController::class,'store']);
//update routes
Route::get('/update/{lesson:id}',[LessonController::class,'edit'])->name('lessons.editLesson');
Route::put('/update/{lesson:id}',[LessonController::class,'update'])->name('lessons.update');
//delete routes
Route::delete('/delete/{lesson:id}',[LessonController::class,'delete'])->name('lessons.delete');

