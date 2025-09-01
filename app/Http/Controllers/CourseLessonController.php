<?php

namespace App\Http\Controllers;

use App\Models\CourseLesson;
use App\Models\CourseModules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CourseLessonController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'course_module_id' => 'required|exists:course_modules,id',
            'title'            => 'required|string|max:255',
            'type'             => 'required|in:text,video,quiz,downloadable',
            'content'          => 'nullable|string',
            'video_url'        => 'nullable|url',
            'downloadable_file' => 'nullable|file|mimes:pdf,doc,docx,zip,ppt,pptx,xls,xlsx,txt,jpg,jpeg,png,gif,webp',
            'order_no'         => 'required|integer',
        ]);

        $lesson = new CourseLesson();
        $lesson->course_module_id = $request->course_module_id;
        $lesson->title            = $request->title;
        $lesson->type             = $request->type;
        $lesson->content          = $request->content;
        $lesson->video_url        = $request->video_url;
        $lesson->order_no         = $request->order_no;


        if ($request->filled('video_url')) {
            $lesson->video_url = $this->convertToEmbedUrl($request->video_url);
        }
        // Handle file upload
        if ($request->hasFile('downloadable_file')) {
            $file = $request->file('downloadable_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $lesson->downloadable_file = $filename;
        }

        $lesson->save();

        return response()->json(['message' => 'Course Lesson Form has been submitted successfully!', 'lesson'  => $lesson]);
    }

    public function show($id)
    {
        $lesson = CourseLesson::find($id);
        return view('admin.courselesson.show', compact('lesson'));
    }

    public function update(Request $request, $id)
    {
        $lesson = CourseLesson::findOrFail($id);


        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:text,video,quiz,downloadable',
            'content' => 'nullable|string',
            'video_url' => 'nullable|url',
            'downloadable_file' => 'nullable|file|mimes:pdf,doc,docx,zip,ppt,pptx,xls,xlsx,txt|max:10240',
            'order_no' => 'nullable|integer',
        ]);

        // Update fields
        $lesson->fill($validated);

        if ($request->filled('video_url')) {
            $lesson->video_url = $this->convertToEmbedUrl($request->video_url);
        }

        // Handle new file upload (if any)
        if ($request->hasFile('downloadable_file')) {
            // Delete old file if exists
            if ($lesson->downloadable_file && File::exists(public_path('uploads/' . $lesson->downloadable_file))) {
                File::delete(public_path('uploads/' . $lesson->downloadable_file));
            }

            $file = $request->file('downloadable_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $lesson->downloadable_file = $filename;
        }


        $lesson->save();

        return response()->json(['message' => 'Course Lesson Form has been updated successfully!', 'lesson'  => $lesson]);
    }

    private function convertToEmbedUrl($url)
    {
        // YouTube conversion
        if (strpos($url, 'youtube.com/watch?v=') !== false) {
            return str_replace('watch?v=', 'embed/', $url);
        }

        // Short YouTube links (youtu.be)
        if (strpos($url, 'youtu.be/') !== false) {
            return str_replace('youtu.be/', 'www.youtube.com/embed/', $url);
        }

        // Vimeo conversion
        if (strpos($url, 'vimeo.com/') !== false) {
            return preg_replace('/vimeo\.com\/(\d+)/', 'player.vimeo.com/video/$1', $url);
        }

        return $url; // return as is if no match
    }

    public function destroy($id)
    {
        $lesson = CourseLesson::findOrFail($id);
        $lesson->delete();

        return response()->json(['message' => 'Course Lesson Form has been deleted successfully!', 'lesson'  => $lesson]);
    }
}
