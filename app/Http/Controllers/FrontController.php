<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\CourseFaqs;
use App\Models\CourseLesson;
use App\Models\CourseModules;
use App\Models\Ebook;
use App\Models\Quiz;
use App\Models\Testimonial;
use App\Models\VideoTestimonial;
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

    public function ebook_details($slug)
    {
        $ebook = Ebook::where('slug', $slug)->firstOrFail();

        // ✅ Fetch related ebooks (example: by category, or just exclude the current one)
        $relatedEbooks = Ebook::where('id', '!=', $ebook->id)
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('frontend.ebookdetails', compact('ebook', 'relatedEbooks'));
    }

    public function login()
    {
        if (! auth()->check()) {
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
        if (! auth()->check()) {
            return redirect()->route('front.login');
        }

        if (auth()->user()->role !== 'user') {
            return redirect()->route('front.login');
        }

        $user = Auth::user();

        // Courses purchased by the user (assuming pivot table user_courses)
        $courses = $user->courses()->latest()->take(3)->get();
        $ebooks = $user->ebooks()->latest()->take(3)->get();

        // Stats
        $stats = [
            'courses' => $user->courses()->count(),
            'hours' => $user->courses()->sum('duration') ?? 0,
            'ebook' => $user->ebooks()->count() ?? 0,
            'certificates' => $user->courses()->where('is_certificate', 1)->count(),
        ];

        // Recent activity (simple example from pivot created_at)
        $courseActivities = $user->courses()
            ->withPivot('created_at')
            ->latest('user_courses.created_at')
            ->take(5)
            ->get()
            ->map(function ($course) {
                return [
                    'type' => $course->is_certificate ? 'certificate' : 'course',
                    'title' => $course->title, // unified key
                    'date' => $course->pivot->created_at,
                    'date_human' => $course->pivot->created_at->diffForHumans(),
                ];
            });

        $ebookActivities = $user->ebooks()
            ->withPivot('created_at')
            ->latest('user_ebooks.created_at')
            ->take(5)
            ->get()
            ->map(function ($ebook) {
                return [
                    'type' => 'ebook',
                    'title' => $ebook->title, // same key as course
                    'date' => $ebook->pivot->created_at,
                    'date_human' => $ebook->pivot->created_at->diffForHumans(),
                ];
            });

        $activities = $courseActivities
            ->merge($ebookActivities)
            ->sortByDesc('date')
            ->take(5)
            ->values();

        // Messages (you can swap with your message model)
        $messages = [];

        return view('frontend.dashboard', compact(
            'user',
            'stats',
            'courses',
            'ebooks',
            'activities',
            'courseActivities',
            'ebookActivities',
            'messages'
        ));
    }

    public function userRegister()
    {

        return view('frontend.register');
    }

    public function purchase($type, $id)
    {
        $user = Auth::user();

        if (! $user) {
            // Either redirect to login page
            return redirect('/login')->with('error', 'Please login first.');

            // OR if you want guest checkout, handle it differently:
            // $user = User::find(1); // e.g. default user
        }

        if ($type === 'course') {
            $item = Course::findOrFail($id);
            $user->courses()->syncWithoutDetaching([$item->id]);
            $itemType = 'course';
        } elseif ($type === 'ebook') {
            $item = Ebook::findOrFail($id);
            $user->ebooks()->syncWithoutDetaching([$item->id]);
            $itemType = 'ebook';
        } else {
            abort(404);
        }

        return view('frontend.purchase_form', compact('item', 'itemType'));
    }
}
