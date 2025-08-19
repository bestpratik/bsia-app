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
Route::get('create-course', [CourseController::class, 'create'])->name('create.course');
Route::post('save-course', [CourseController::class, 'store'])->name('save.course');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('show.course');
Route::patch('/course/{id}/status', [CourseController::class, 'toggleStatus'])->name('course.toggleStatus');
Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('edit.course');
Route::put('/course/{id}/update', [CourseController::class, 'update'])->name('update.course');
Route::delete('/course/{id}/delete', [CourseController::class, 'destroy'])->name('delete.course');


//Course Module section
Route::get('coursemodules', [CourseModuleController::class, 'index'])->name('coursemodules');
Route::get('create-coursemodules', [CourseModuleController::class, 'create'])->name('create.coursemodules');
Route::post('save-coursemodules', [CourseModuleController::class, 'store'])->name('save.coursemodules');
Route::get('/coursemodules/{id}', [CourseModuleController::class, 'show'])->name('show.coursemodules');
Route::patch('/coursemodules/{id}/status', [CourseModuleController::class, 'toggleStatus'])->name('coursemodules.toggleStatus');
Route::get('/coursemodules/{id}/edit', [CourseModuleController::class, 'edit'])->name('edit.coursemodules');
Route::put('/coursemodules/{id}/update', [CourseModuleController::class, 'update'])->name('update.coursemodules');
Route::delete('/coursemodules/{id}/delete', [CourseModuleController::class, 'destroy'])->name('delete.coursemodules');

//Course Lesson section
Route::get('courselessons', [CourseLessonController::class, 'index'])->name('courselessons');
Route::get('create-courselessons', [CourseLessonController::class, 'create'])->name('create.courselessons');
Route::post('save-courselessons', [CourseLessonController::class, 'store'])->name('save.courselessons');
Route::get('/courselessons/{id}', [CourseLessonController::class, 'show'])->name('show.courselessons');
Route::patch('/courselessons/{id}/status', [CourseLessonController::class, 'toggleStatus'])->name('courselessons.toggleStatus');
Route::get('/courselessons/{id}/edit', [CourseLessonController::class, 'edit'])->name('edit.courselessons');
Route::put('/courselessons/{id}/update', [CourseLessonController::class, 'update'])->name('update.courselessons');
Route::delete('/courselessons/{id}/delete', [CourseLessonController::class, 'destroy'])->name('delete.courselessons');


// Route::get('/', [FrontController::class, 'home'])->name('home');

require __DIR__.'/auth.php';
