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
Route::get('students',[StudentsController::class,'index'])->name('students');
Route::get('student/{student:id',[StudentsController::class,'show'])->name('student.show');
//create routes
Route::get('/create',[StudentsController::class,'create'])->name('create');
Route::post('create',['StudentsController::class','store']);
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
