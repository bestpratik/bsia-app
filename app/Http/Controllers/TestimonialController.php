<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonial'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $testimonial = new Testimonial;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $testimonial->image = $filename;
        }

        $testimonial->name = $request['name'];
        $testimonial->profession = $request['profession'];
        $testimonial->review = $request['review'];
        $testimonial->created_at = date("Y-m-d H:i:s");
        $testimonial->updated_at = null;

        $testimonial->save();

        return redirect('testimonial')->with('message', 'Testimonial added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $testimonial = Testimonial::find($id);

        if ($request->hasfile('image')) {

            //Delete previous file
            $destination = public_path('uploads/' . $testimonial->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $testimonial->image = $filename;
        }

        $testimonial->name = $request['name'];
        $testimonial->profession = $request['profession'];
        $testimonial->review = $request['review'];
        $testimonial->created_at = null;
        $testimonial->updated_at = date("Y-m-d H:i:s");

        $testimonial->update();

        return redirect('testimonial')->with('message', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $testimonial = testimonial::find($id);
        if ($testimonial) {
            $destination = public_path('uploads/' . $testimonial->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $testimonial->delete();
            return redirect('testimonial')->with('message', 'Testimonial deleted successfully');
        } else {
            return redirect('testimonial')->with('message', 'No Testimonial found to delete');
        }
    }
}
