<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseLessonController;
use App\Http\Controllers\CourseModuleController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Course section
Route::get('course', [CourseController::class, 'index'])->name('course');
Route::get('course-create', [CourseController::class, 'create'])->name('create.course');
Route::post('course-save', [CourseController::class, 'store'])->name('save.course');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('show.course');
Route::patch('/course/{id}/status', [CourseController::class, 'toggleStatus'])->name('course.toggleStatus');
Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('edit.course');
Route::put('/course/{id}/update', [CourseController::class, 'update'])->name('update.course');
Route::delete('/course/{id}/delete', [CourseController::class, 'destroy'])->name('delete.course');


//Course Module section
Route::post('/course-modules', [CourseModuleController::class, 'store'])->name('course-modules.store');
Route::put('/course-modules/{id}', [CourseModuleController::class, 'update'])->name('course-modules.update');
Route::delete('/course-modules/{id}/delete', [CourseModuleController::class, 'destroy'])->name('course-modules.destroy');
Route::get('/coursemodules/{id}/show', [CourseModuleController::class, 'show'])->name('show.coursemodules');


//Course Lesson section
Route::post('/course-lessons', [CourseLessonController::class, 'store'])->name('course-lessons.store');
Route::put('/course-lessons/{id}', [CourseLessonController::class, 'update'])->name('course-lessons.update');
Route::delete('/course-lessons/{id}/delete', [CourseLessonController::class, 'destroy'])->name('course-lessons.destroy');
Route::get('/courselessons/{id}/show', [CourseLessonController::class, 'show'])->name('show.courselessons');


// Route::get('/', [FrontController::class, 'home'])->name('home');

require __DIR__ . '/auth.php';
