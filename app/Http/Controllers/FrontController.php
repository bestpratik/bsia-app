<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\CourseFaqs;
use App\Models\CourseFeature;
use App\Models\CourseLesson;
use App\Models\CourseModules;
use App\Models\Ebook;
use App\Models\Testimonial;
use App\Models\Quiz;
use App\Models\VideoTestimonial;
use Illuminate\Http\Request; 

class FrontController extends Controller
{
    public function home()
    {
        $about = About::first();
        $banners = Banner::all();
        $courses = Course::all();
        $testimonial = Testimonial::all();
        $videotestimonial = VideoTestimonial::all();
        // dd($videotestimonial);
        return view('frontend.home', compact('about', 'banners', 'courses', 'testimonial', 'videotestimonial'));
    }

    public function course()
    {
        $course = Course::all();
        return view('frontend.course', compact('course'));
    }

    public function course_details($slug)
    {
        $lession = CourseLesson::all();
        $course = Course::where('slug', $slug)->firstOrFail();
        $modules = CourseModules::where('course_id', $course->id)
            ->where('status', 1)
            ->orderBy('order_no', 'asc')
            ->with(['lessons', 'quizzes'])
            ->get();
        $relatedCourses = Course::where('id', '!=', $course->id)->get();
        $learning = Course::where('slug', $slug)->firstOrFail();
        $quizzes = Quiz::all();
        return view('frontend.coursedetails', compact('lession', 'course', 'modules', 'relatedCourses', 'learning', 'quizzes'));
    }

    public function course_learning($slug)
    {
        // $course = Course::first();
        $ebook = Ebook::all();
        $learning = Course::where('slug', $slug)->firstOrFail();
        $faqs = CourseFaqs::all();
        $testimonial = Testimonial::all();
        $courses = Videotestimonial::first();


        $modules = CourseModules::with(['lessons' => function ($q) {
            $q->orderBy('id', 'asc');
        }])
            ->where('course_id', $learning->id)
            ->orderBy('order_no', 'asc')
            ->get();

        return view('frontend.courselearning', compact('ebook', 'learning', 'faqs', 'testimonial', 'modules', 'courses'));

    }

    public function ebooks()
    {
        $ebook = Ebook::all();
        return view('frontend.ebook', compact('ebook'));
    }

    public function ebook_details($id)
    {
        $ebook = Ebook::findOrFail($id);

        // ✅ Fetch related ebooks (example: by category, or just exclude the current one)
        $relatedEbooks = Ebook::where('id', '!=', $ebook->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('frontend.ebookdetails', compact('ebook', 'relatedEbooks'));
    }


    public function login()
    {
        if (!auth()->check()) {
            return view('frontend.login');
        }

        if (auth()->user()->role == 'user') {
            return redirect()->route('user.dashboard');
        }elseif(auth()->user()->role == 'admin'){
            return redirect()->route('dashboard');
        }
        
    }

    public function dashboard()
    {
        if (!auth()->check()) {
        return redirect()->route('front.login');
    }

    if (auth()->user()->role !== 'user') {
        return redirect()->route('front.login');
    }

    return view('frontend.dashboard');
        
    }

    public function userRegister(){

        return view('frontend.register');
    }

    public function purchase($type, $id)
    {
        if ($type === 'course') {
            $item = Course::findOrFail($id);
            $itemType = 'course';
        } elseif ($type === 'ebook') {
            $item = Ebook::findOrFail($id);
            $itemType = 'ebook';
        } else {
            abort(404);
        }

        return view('frontend.purchase_form', compact('item', 'itemType'));
    }
}
