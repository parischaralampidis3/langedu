<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;


//Dashboard routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','is_suspended'])->name('dashboard');
//Students routes
Route::get('/suspended', function () {
    return view('dashboard');  // Or whichever view you want to show
})->name('is_suspended');
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

Route::get('/',function(){
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
