<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseFaqsController;
use App\Http\Controllers\CourseLessonController;
use App\Http\Controllers\CourseModuleController;
use App\Http\Controllers\EbookController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VideoTestimonialController;
use App\Models\CourseFaqs;
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
Route::get('course/create', [CourseController::class, 'create'])->name('create.course');
Route::post('course/save', [CourseController::class, 'store'])->name('save.course');
Route::get('/course/{id}', [CourseController::class, 'show'])->name('show.course');
Route::patch('/course/{id}/status', [CourseController::class, 'toggleStatus'])->name('course.toggleStatus');
Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('edit.course');
Route::put('/course/{id}/update', [CourseController::class, 'update'])->name('update.course');
Route::delete('/course/{id}/delete', [CourseController::class, 'destroy'])->name('delete.course');


//Course Module section
Route::post('/course/modules', [CourseModuleController::class, 'store'])->name('course-modules.store');
Route::put('/course-modules/{id}', [CourseModuleController::class, 'update'])->name('course-modules.update');
Route::delete('/course-modules/{id}', [CourseModuleController::class, 'destroy'])->name('course-modules.destroy');
Route::get('/coursemodules/{id}/show', [CourseModuleController::class, 'show'])->name('show.coursemodules');


//Course Lesson section
Route::post('/courselessons', [CourseLessonController::class, 'store'])->name('courselessons.store');
Route::put('/courselessons/{id}', [CourseLessonController::class, 'update'])->name('courselessons.update');
Route::delete('/courselessons/{id}', [CourseLessonController::class, 'destroy'])->name('courselessons.destroy');
Route::get('/courselessons/{id}/show', [CourseLessonController::class, 'show'])->name('show.courselessons');



//CourseFaq section
Route::post('/course/faq/store', [CourseFaqsController::class, 'store'])->name('courseFaq.store');
Route::post('/course/faq/{id}/update', [CourseFaqsController::class, 'update'])->name('courseFaq.update');
Route::delete('/course-faq/{id}/delete', [CourseFaqsController::class, 'destroy'])->name('courseFaq.destroy');
Route::get('/coursefaq/{id}', [CourseFaqsController::class, 'show'])->name('show.coursefaq');



//Ebook section
Route::get('ebook', [EbookController::class, 'index'])->name('ebook');
Route::get('ebook/create', [EbookController::class, 'create'])->name('create.ebook');
Route::post('ebook/save', [EbookController::class, 'store'])->name('save.ebook');
Route::get('/ebook/{id}', [EbookController::class, 'show'])->name('show.ebook');
Route::patch('/ebook/{id}/status', [EbookController::class, 'toggleStatus'])->name('ebook.toggleStatus');
Route::get('/ebook/{id}/edit', [EbookController::class, 'edit'])->name('edit.ebook');
Route::put('/ebook/{id}/update', [EbookController::class, 'update'])->name('update.ebook');
Route::delete('/ebook/{id}/delete', [EbookController::class, 'destroy'])->name('delete.ebook');


//About sections
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('create/about', [AboutController::class, 'create'])->name('create.about');
Route::post('save/about', [AboutController::class, 'store'])->name('save.about');
Route::get('/about/{id}/edit', [AboutController::class, 'edit'])->name('edit.about');
Route::put('/about/{id}/update', [AboutController::class, 'update'])->name('update.about');
Route::delete('/about/{id}/delete', [AboutController::class, 'destroy'])->name('delete.about');


//Banner sections
Route::get('banner', [BannerController::class, 'index'])->name('banner');
Route::get('create/banner', [BannerController::class, 'create'])->name('create.banner');
Route::post('save/banner', [BannerController::class, 'store'])->name('save.banner');
Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('edit.banner');
Route::put('/banner/{id}/update', [BannerController::class, 'update'])->name('update.banner');
Route::delete('/banner/{id}/delete', [BannerController::class, 'destroy'])->name('delete.banner');


// Video Testimonial section
Route::get('videotestimonial', [VideoTestimonialController::class, 'index'])->name('videotestimonial');
Route::get('create/videotestimonial', [VideoTestimonialController::class, 'create'])->name('create.videotestimonial');
Route::post('save/videotestimonial', [VideoTestimonialController::class, 'store'])->name('save.videotestimonial');
Route::get('/videotestimonial/{id}/edit', [VideoTestimonialController::class, 'edit'])->name('edit.videotestimonial');
Route::put('/videotestimonial/{id}/update', [VideoTestimonialController::class, 'update'])->name('update.videotestimonial');
Route::delete('/videotestimonial/{id}/delete', [VideoTestimonialController::class, 'destroy'])->name('delete.videotestimonial');


// Testimonial section
Route::get('testimonial', [TestimonialController::class, 'index'])->name('testimonial');
Route::get('create/testimonial', [TestimonialController::class, 'create'])->name('create.testimonial');
Route::post('save/testimonial', [TestimonialController::class, 'store'])->name('save.testimonial');
Route::get('/testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('edit.testimonial');
Route::put('/testimonial/{id}/update', [TestimonialController::class, 'update'])->name('update.testimonial');
Route::delete('/testimonial/{id}/delete', [TestimonialController::class, 'destroy'])->name('delete.testimonial');


Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('about-us', [FrontController::class, 'about'])->name('about.us');
Route::get('courses', [FrontController::class, 'course'])->name('courses');
Route::get('course-details', [FrontController::class, 'course_details'])->name('course.details');
Route::get('course-learning', [FrontController::class, 'course_learning'])->name('course.learning');
Route::get('ebooks', [FrontController::class, 'ebooks'])->name('ebooks');
Route::get('log_in', [FrontController::class, 'login'])->name('front.login');
// Route::get('dash', [FrontController::class, 'dashboard'])->name('front.dashboard');

require __DIR__ . '/auth.php';
