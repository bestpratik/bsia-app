<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseFaqs;
use Illuminate\Http\Request;

class CourseFaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coursefaq = CourseFaqs::all();
        return view('admin.coursefaq.index', compact('coursefaq'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $course = Course::all();
        return view('admin.coursefaq.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $coursefaq = new CourseFaqs;

        $coursefaq->course_id = $request->course_id;
        $coursefaq->title = $request['title'];
        $coursefaq->description = $request->description;
        $coursefaq->order_no = $request->order_no;

        $coursefaq->save();
        return redirect('coursefaq')->with('success', 'Coursefaq created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseFaqs $courseFaqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $course = Course::all();
        $coursefaq = CourseFaqs::find($id);
        return view('admin.coursefaq.edit', compact('course', 'coursefaq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $coursefaq = CourseFaqs::find($id);

        $coursefaq->course_id = $request->course_id;
        $coursefaq->title = $request['title'];
        $coursefaq->description = $request->description;
        $coursefaq->order_no = $request->order_no;

        $coursefaq->update();
        return redirect('coursefaq')->with('success', 'Coursefaq updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coursefaq = CourseFaqs::findOrFail($id);
        $coursefaq->delete();

        return redirect('coursefaq')->with('success', 'Coursefaq deleted successfully!');
    }
}
