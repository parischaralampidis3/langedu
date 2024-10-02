<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\LessonController;
use Illuminate\Support\Facades\Route;

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Prefix all student-related routes
Route::prefix('students')->group(function () {
    // Create routes (define static routes first)
    Route::get('/create', [StudentsController::class, 'create'])->name('students.createStudent');
    Route::post('/create', [StudentsController::class, 'store']);

    // Index and Show routes
    Route::get('/', [StudentsController::class, 'index'])->name('students.indexStudents');
    Route::get('/{student:id}', [StudentsController::class, 'show'])->name('students.showStudent');

    // Update routes
    Route::get('/update/{student:id}', [StudentsController::class, 'edit'])->name('students.editStudent');
    Route::put('/update/{student:id}', [StudentsController::class, 'update'])->name('students.update');

    // Delete route
    Route::delete('/delete/{student:id}', [StudentsController::class, 'destroy'])->name('students.delete');
});

// Prefix all lesson-related routes
Route::prefix('lessons')->group(function () {
    // Create routes (define static routes first)
    Route::get('/create', [LessonController::class, 'create'])->name('lessons.createLesson');
    Route::post('/create', [LessonController::class, 'store']);

    // Index and Show routes
    Route::get('/', [LessonController::class, 'index'])->name('lessons.indexLessons');
    Route::get('/{lesson:id}', [LessonController::class, 'show'])->name('lessons.showLesson');

    // Update routes
    Route::get('/update/{lesson:id}', [LessonController::class, 'edit'])->name('lessons.editLesson');
    Route::put('/update/{lesson:id}', [LessonController::class, 'update'])->name('lessons.update');

    // Delete route
    Route::delete('/delete/{lesson:id}', [LessonController::class, 'delete'])->name('lessons.delete');
});

// Auth routes
Route::get('/', function () {
    return view('auth.register');
});

// Profile-related routes with authentication middleware
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
