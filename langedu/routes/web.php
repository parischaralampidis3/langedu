<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;


//Dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//Students routes
//index routes
Route::get('students',[StudentsController::class,'index'])->name('students.indexStudents');
Route::get('student/{student:id}',[StudentsController::class,'show'])->name('students.showStudent');
//create routes
Route::get('/create',[StudentsController::class,'create'])->name('students.createStudent');
Route::post('create',[StudentsController::class,'store']);
//update routes
Route::get('/update',[StudentsController::class,'edit'])->name('students.editStudent');
Route::post('update',[StudentsController::class,'update']);

//---------------

Route::get('/',function(){
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
