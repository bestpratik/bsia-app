<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseModules;
use Illuminate\Http\Request;

class CourseModuleController extends Controller
{
    public function index()
    {
        $coursemod = CourseModules::all();
        return view('admin.coursemodules.index', compact('coursemod'));
    }

    public function create()
    {
        $course = Course::all();
        return view('admin.coursemodules.create', compact('course'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $coursemod = new CourseModules;

        $coursemod->course_id = $request->course_id; 
        $coursemod->name = $request->name;
        $coursemod->description = $request->description;
        $coursemod->status = $request->status;
        $coursemod->order_no = $request->order_no;
        $coursemod->created_at = date("Y-m-d H:i:s");
        $coursemod->updated_at = null;

        $coursemod->save();
        return redirect('coursemodules')->with('success', 'Course Module created successfully!');
    }

    public function show($id)
    {
        $coursemod = CourseModules::find($id);
        return view('admin.coursemodules.show', compact('coursemod'));
    }

    public function toggleStatus($id)
    {
        $coursemod = CourseModules::find($id);

    if (!$coursemod) {
        return redirect('coursemodules')->with('error', 'Course Module not found.');
    }

    $coursemod->status = !$coursemod->status; 
        $coursemod->save();

        return redirect('coursemodules')->with('success', 'Course Module status updated successfully.');
    }

    public function edit($id)
    {
        $coursemod = CourseModules::find($id);
        $course = Course::all();
        return view('admin.coursemodules.edit', compact('coursemod', 'course'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $coursemod = CourseModules::find($id);

        $coursemod->course_id = $request->course_id;
        $coursemod->name = $request->name;
        $coursemod->description = $request->description;
        $coursemod->status = $request->status;
        $coursemod->order_no = $request->order_no;
        $coursemod->created_at = date("Y-m-d H:i:s");
        $coursemod->updated_at = null;

        $coursemod->update();
        return redirect('coursemodules')->with('success', 'Course Module updated successfully!');
    }

    public function destroy(string $id)
    {
        $coursemod = CourseModules::find($id);
        if($coursemod){
            $coursemod->delete();
            return redirect('coursemodules')->with('success', 'Course Module Deleted successfully');
        }else{
            return redirect('coursemodules')->with('success', 'No Course Module Deleted successfully');

        }
    }
}
