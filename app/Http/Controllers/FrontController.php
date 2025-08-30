<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\Testimonial;
use App\Models\VideoTestimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $about = About::first();
        $banner = Banner::first();
        $courses = Course::all();
        $testimonial = Testimonial::all();
        $videotestimonial = VideoTestimonial::all();
        // dd($videotestimonial);
        return view('frontend.home', compact('about', 'banner', 'courses', 'testimonial', 'videotestimonial'));
    }

    public function course()
    {
        // $courses = Course::all();
        return view('frontend.course');
    }

    public function course_details()
    {
        return view('frontend.coursedetails');
    }

    public function course_learning()
    {
        return view('frontend.courselearning');
    }

    public function ebooks()
    {
        return view('frontend.ebook');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function dashboard()
    {
        return view('frontend.dashboard');
    }
}
