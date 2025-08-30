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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        //
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
        return response()->json(['message' => 'Course faq Form has been added successfully!', 'coursefaq'  => $coursefaq]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $coursefaq = CourseFaqs::find($id);
        return view('admin.coursefaq.show', compact('coursefaq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
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
        return response()->json(['message' => 'Course faq Form has been updated successfully!', 'coursefaq'  => $coursefaq]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coursefaq = CourseFaqs::findOrFail($id);
        $coursefaq->delete();

        return response()->json(['message' => 'Course faq Form has been deleted successfully!', 'coursefaq'  => $coursefaq]);
    }
}
