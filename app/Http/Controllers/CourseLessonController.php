<?php

namespace App\Http\Controllers;

use App\Models\CourseLesson;
use App\Models\CourseModules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseLessonController extends Controller
{
    public function index()
    {
        $courselesson = CourseLesson::all();
        return view('admin.courselesson.index', compact('courselesson'));
    }

    public function create()
    {
        $coursemod = CourseModules::all();
        return view('admin.courselesson.create', compact('coursemod'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'course_module_id' => 'required|exists:course_modules,id',
            'type' => 'nullable|in:video,text,quiz,downloadable',
            'downloadable_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,txt,zip,rar,ppt,pptx',
        ]);

        $courselesson = new CourseLesson;

        // File upload
        // if ($request->hasFile('downloadable_file')) {
        //     $fileName = time() . '_' . $request->file('downloadable_file')->getClientOriginalName();
        //     $request->file('downloadable_file')->move(public_path('uploads'), $fileName);
        //     $courselesson->downloadable_file = $fileName;
        // }

        if ($request->hasFile('downloadable_file')) {
            $file = $request->file('downloadable_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $courselesson->downloadable_file = $filename;
        }

        $courselesson->course_module_id = $request->course_module_id;
        $courselesson->title = $request->title;
        $courselesson->type = $request->type;
        $courselesson->content = $request->content;
        $courselesson->video_url = $request->video_url;
        $courselesson->order_no = $request->order_no;
        $courselesson->created_at = date("Y-m-d H:i:s");
        $courselesson->updated_at = null;

        $courselesson->save();
        return redirect('courselessons')->with('success', 'Course Lesson created successfully!');
    }

    public function show($id)
    {
        $courselesson = CourseLesson::find($id);
        return view('admin.courselesson.show', compact('coursemod'));
    }

    // public function toggleStatus($id)
    // {
    //     $courselesson = CourseLesson::find($id);

    // if (!$courselesson) {
    //     return redirect('coursemodules')->with('error', 'Course Lesson not found.');
    // }

    // $courselesson->status = !$courselesson->status; 
    //     $courselesson->save();

    //     return redirect('coursemodules')->with('success', 'Course Lesson status updated successfully.');
    // }

    public function edit($id)
    {
        $courselesson = CourseLesson::find($id);
        $coursemod = CourseModules::all();
        return view('admin.courselesson.edit', compact('courselesson', 'coursemod'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'downloadable_file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,csv,txt,zip,rar,ppt,pptx',
        ]);

        $courselesson = CourseLesson::find($id);

        // if ($request->hasFile('downloadable_file')) {
        //     $fileName = time() . '_' . $request->file('downloadable_file')->getClientOriginalName();
        //     $request->file('downloadable_file')->move(public_path('uploads'), $fileName);
        //     $courselesson->downloadable_file = $fileName;
        // }

        if ($request->hasFile('downloadable_file')) {

            //Delete previous file

            $destination = public_path('uploads/' . $courselesson->downloadable_file);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('downloadable_file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $courselesson->downloadable_file = $filename;
        }

        $courselesson->course_module_id = $request->course_module_id;
        $courselesson->title = $request->title;
        $courselesson->type = $request->type;
        $courselesson->content = $request->content;
        $courselesson->video_url = $request->video_url;
        $courselesson->order_no = $request->order_no;
        $courselesson->created_at = date("Y-m-d H:i:s");
        $courselesson->updated_at = null;

        $courselesson->update();
        return redirect('courselessons')->with('success', 'Course Lesson updated successfully!');
    }

    public function destroy(string $id)
    {
        $courselesson = CourseLesson::find($id);
        if ($courselesson) {
            $courselesson->delete();
            return redirect('courselessons')->with('success', 'Course Lesson Deleted successfully');
        } else {
            return redirect('courselessons')->with('success', 'No Course Lesson Deleted successfully');
        }
    }
}
