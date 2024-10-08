<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StudentsLessonController;

//Dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


//index routes
Route::get('lessons',[LessonController::class,'indexLessons'])->name('lessons.indexLessons');
Route::get('lesson/{lesson:id}',[LessonController::class,'showLesson'])->name('lessons.showLesson');
//create routes
Route::get('/createLesson',[LessonController::class,'createLesson'])->name('lessons.createLesson');
Route::post('createLesson',[LessonController::class,'storeLesson']);

//update routes
Route::get('/editLesson/{lesson:id}',[LessonController::class,'editLesson'])->name('lessons.editLesson');
Route::put('updateLesson/{lesson:id}',[LessonController::class,'updateLesson'])->name('lessons.update');

//delete routes
//delete routes
Route::delete('/destroyLesson/{student:id}',[LessonController::class,'destroyLesson'])->name('lessons.destroyLesson');

//Students routes
//index routes
Route::get('students',[StudentsController::class,'index'])->name('students.indexStudents');
Route::get('student/{student:id}',[StudentsController::class,'show'])->name('students.showStudent');
//create routes
Route::get('/create',[StudentsController::class,'create'])->middleware('auth')->name('students.createStudent');
Route::post('create',[StudentsController::class,'store']);

//update routes
Route::get('/update/{student:id}',[StudentsController::class,'edit'])->name('students.editStudent');
Route::put('update/{student:id}',[StudentsController::class,'update'])->name('students.update');


Route::put('/students/{id}/toggle-suspend', [StudentsController::class, 'toggleSuspend'])->name('students.toggleSuspend');

//archive routes
Route::get('archive',[StudentsController::class,'archive'])->name('students.archiveStudent');
//---------------
//delete routes
Route::delete('/delete/{student:id}',[StudentsController::class,'destroy'])->name('students.delete');

//restore routes
Route::post('/restore/{student:id}',[StudentsController::class,'restore'])->name('students.restore');

//enroll students view route

Route::get('/createEnrollment',[StudentsLessonController::class,'createEnrollment'])->name('students.enrrollStudent');

//enroll students at lessons
Route::post('/createEnrollment',[StudentsLessonController::class,'storeEnrollment']);



Route::get('/', function () {

    return view('auth.register');
});

// Profile routes (after authentication)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
