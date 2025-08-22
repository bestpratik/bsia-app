<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseLesson;
use App\Models\CourseModules;
use Illuminate\Http\Request;

class CourseModuleController extends Controller
{
    public function index()
    {
        $module = CourseModules::all();
        return view('admin.coursemodules.index', compact('module'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_no' => 'required|integer',
            'status' => 'nullable|boolean',
        ]);

        $module = new CourseModules;
        $module->course_id = $request->course_id;
        $module->name = $request->name;
        $module->description = $request->description;
        $module->order_no = $request->order_no;
        $module->status = $request->status ? 1 : 0;
        $module->save();

        return response()->json(['message' => 'Course Module Form has been submitted successfully!', 'module'  => $module]);
    }

    public function show($id)
    {
        $module = CourseModules::find($id);
        $courseLesson = CourseLesson::where('course_module_id', $id)->get();
        return view('admin.coursemodules.show', compact('module', 'courseLesson'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order_no' => 'nullable|integer',
            'status' => 'nullable|boolean'
        ]);

        $module = CourseModules::findOrFail($id);
        $module->update([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'order_no' => $validated['order_no'] ?? null,
            'status' => $request->has('status') ? 1 : 0
        ]);

        return response()->json(['message' => 'Course Module Form has been updated successfully!', 'module'  => $module]);
    }

    public function destroy($id)
    {
        $module = CourseModules::findOrFail($id);
        $module->delete();

        return response()->json(['message' => 'Course Module Form has been deleted successfully!']);
    }
}
