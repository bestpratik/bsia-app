<?php

namespace App\Http\Controllers;

use App\Models\VideoTestimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoTestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videoTestimonial = VideoTestimonial::all();
        return view('admin.videotestimonial.index', compact('videoTestimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.videotestimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'video_path' => 'nullable|file|mimes:mp4,mov,avi,webm',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $videoTestimonial = new VideoTestimonial;

        // Upload video
        if ($request->hasFile('video_path')) {
            $file = $request->file('video_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $videoTestimonial->video_path = $filename;
        }

        // Upload thumbnail
        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $videoTestimonial->image = $filename;
        }

        $videoTestimonial->name = $request->name;
        $videoTestimonial->location = $request->location;
        $videoTestimonial->created_at = now();
        $videoTestimonial->updated_at = null;
        // dd($videoTestimonial);
        $videoTestimonial->save();
        return redirect('videotestimonial')->with('message', 'Video Testimonial added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(VideoTestimonial $videoTestimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $videoTestimonial = VideoTestimonial::find($id);
        return view('admin.videotestimonial.edit', compact('videoTestimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'video_path' => 'nullable|file|mimes:mp4,mov,avi,webm',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp'
        ]);

        $videoTestimonial = VideoTestimonial::find($id);

        // Replace video if new one is uploaded
        if ($request->hasFile('video_path')) {
            $destination = public_path('uploads/' . $videoTestimonial->video_path);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('video_path');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $videoTestimonial->video_path = $filename;
        }

        // Replace thumbnail if new one is uploaded
        if ($request->hasfile('image')) {

            //Delete previous file
            $destination = public_path('uploads/' . $videoTestimonial->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $videoTestimonial->image = $filename;
        }

        $videoTestimonial->name = $request->name;
        $videoTestimonial->location = $request->location;
        $videoTestimonial->created_at = null; 
        $videoTestimonial->updated_at = now();

        $videoTestimonial->update();
        return redirect('videotestimonial')->with('message', 'Video Testimonial updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $videoTestimonial = VideoTestimonial::find($id);
        if ($videoTestimonial) {
            $destination = public_path('uploads/' . $videoTestimonial->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $videoTestimonial->delete();
            return redirect('videotestimonial')->with('message', 'Video Testimonial deleted successfully!');
        } else {
            return redirect('videotestimonial')->with('message', 'No Video Testimonial found to delete');
        }
    }
}
