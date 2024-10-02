<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
//Students routes
//index routes
Route::get('students',[StudentsController::class,'index'])->name('students.indexStudents');
Route::get('student/{student:id}',[StudentsController::class,'show'])->name('students.showStudent');
//create routes
Route::get('/create',[StudentsController::class,'create'])->name('students.createStudent');
Route::post('create',[StudentsController::class,'store']);
//update routes
Route::get('/update/{student:id}',[StudentsController::class,'edit'])->name('students.editStudent');
Route::put('update/{student:id}',[StudentsController::class,'update'])->name('students.update');
//---------------
//delete routes
Route::delete('/delete/{student:id}',[StudentsController::class,'destroy'])->name('students.delete');
