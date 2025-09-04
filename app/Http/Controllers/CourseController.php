<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseFaqs;
use App\Models\CourseModules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view('admin.course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'mrp' => 'required|numeric',
            'sellable_price' => 'required|numeric',
            'order_no' => 'required|integer'
        ]);

        $course = new Course;

        if ($request->hasfile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $course->featured_image = $filename;
        }

        if ($request->hasFile('certificate_file')) {
            $file = $request->file('certificate_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $course->certificate_file = $filename;
        }

        $slug = Str::slug($request['title']);
        $course->title = $request['title'];
        $course->slug = $slug;
        $course->short_description = $request->short_description;
        $course->about_course = $request->about_course;
        $course->why_join_the_course = $request->why_join_the_course;
        $course->instructor_name = $request->instructor_name;
        $course->instructor_designation = $request->instructor_designation;
        $course->instructor_details = $request->instructor_details;
        $course->mrp = $request->mrp;
        $course->sellable_price = $request->sellable_price;
        $course->is_popular = $request->is_popular;
        $course->show_on_home = $request->show_on_home;
        $course->is_certificate = $request->is_certificate;
        $course->language = $request->language;
        $course->status = 1;
        $course->order_no = $request->order_no;
        $course->created_at = date("Y-m-d H:i:s");
        $course->updated_at = null;

        $course->save();
        return redirect('course')->with('success', 'Course created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $courseModules = CourseModules::where('course_id', $id)->get();
        $courseFaq = CourseFaqs::where('course_id', $id)->get();
        // dd($courseModules);
        return view('admin.course.show', compact('course', 'courseModules', 'courseFaq'));
    }

    public function toggleStatus($id)
    {
        $course = Course::find($id);
        $course->status = !$course->status;
        $course->save();

        return redirect('course')->with('success', 'Course status updated successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'mrp' => 'required|numeric',
            'sellable_price' => 'required|numeric',
            'order_no' => 'required|integer',
        ]);

        $course = Course::find($id);

        if ($request->hasfile('featured_image')) {

            //Delete previous file
            $destination = public_path('uploads/' . $course->featured_image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('featured_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $course->featured_image = $filename;
        }

        if ($request->hasFile('certificate_file')) {

            //Delete previous file

            $destination = public_path('uploads/' . $course->certificate_file);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('certificate_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $course->certificate_file = $filename;
        }

        $slug = Str::slug($request['title']);
        $course->title = $request['title'];
        $course->slug = $slug;
        $course->short_description = $request->short_description;
        $course->about_course = $request->about_course;
        $course->why_join_the_course = $request->why_join_the_course;
        $course->instructor_name = $request->instructor_name;
        $course->instructor_designation = $request->instructor_designation;
        $course->instructor_details = $request->instructor_details;
        $course->mrp = $request->mrp;
        $course->sellable_price = $request->sellable_price;
        $course->is_popular = $request->is_popular;
        $course->show_on_home = $request->show_on_home;
        $course->is_certificate = $request->is_certificate;
        $course->language = $request->language;
        // $course->status = $request->status;
        $course->order_no = $request->order_no;
        $course->created_at = date("Y-m-d H:i:s");
        $course->updated_at = null;

        $course->update();
        return redirect('course')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        if ($course) {
            $destination = public_path('uploads/' . $course->featured_image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $course->delete();
            return redirect('course')->with('success', 'Course deleted successfully!');
        } else {
            return redirect('course')->with('success', 'No course found to be deleted!');
        }
    }
}
