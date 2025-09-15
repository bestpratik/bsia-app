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
use App\Models\VideoTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            ->orderBy('order_no', 'desc')
            ->with(['lessons', 'quizzes'])
            ->get();
        $relatedCourses = Course::where('id', '!=', $course->id)->get();
        $learning = Course::where('slug', $slug)->firstOrFail();
        return view('frontend.coursedetails', compact('lession', 'course', 'modules', 'relatedCourses', 'learning'));
    }

    public function course_learning($slug)
    {
        // $course = Course::first();
        $ebook = Ebook::all();
        $learning = Course::where('slug', $slug)->firstOrFail();
        $faqs = CourseFaqs::all();
        $testimonial = Testimonial::all();


        $modules = CourseModules::with(['lessons' => function ($q) {
            $q->orderBy('id', 'asc');
        }])
            ->where('course_id', $learning->id)
            ->orderBy('order_no', 'asc')
            ->get();

        return view('frontend.courselearning', compact('ebook', 'learning', 'faqs', 'testimonial', 'modules'));
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
        } elseif (auth()->user()->role == 'admin') {
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

        $user = Auth::user();

        // Courses purchased by the user (assuming pivot table user_courses)
        $courses = $user->courses()->latest()->take(3)->get();

        // Stats
        $stats = [
            'courses'      => $user->courses()->count(),
            'hours'        => $user->courses()->sum('duration') ?? 0, // add duration field in courses
            'posts'        => 0, // replace with real relation if needed
            'certificates' => $user->courses()->where('is_certificate', 1)->count(),
        ];

        // Recent activity (simple example from pivot created_at)
        $activities = $user->courses()
            ->withPivot('created_at')
            ->latest('user_courses.created_at')
            ->take(5)
            ->get()
            ->map(function ($course) {
                return [
                    'type' => $course->is_certificate ? 'certificate' : 'enrolled',
                    'course' => $course->title,
                    'date' => $course->pivot->created_at->diffForHumans(),
                ];
            });

        // Messages (you can swap with your message model)
        $messages = [];

        return view('frontend.dashboard', compact(
            'user',
            'stats',
            'courses',
            'activities',
            'messages'
        ));
    }

    public function userRegister()
    {

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
