<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::all();
        return view('admin.about.index', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $about = new About;

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $about->image = $filename;
        }

        $about->title = $request['title'];
        $about->sub_title = $request['sub_title'];
        $about->description = $request['description'];
        $about->created_at = date("Y-m-d H:i:s");
        $about->updated_at = null;

        $about->save();

        return redirect('about')->with('message', 'About added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $about = About::find($id);

        if ($request->hasfile('image')) {

            //Delete previous file
            $destination = public_path('uploads/' . $about->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $about->image = $filename;
        }

        $about->title = $request['title'];
        $about->sub_title = $request['sub_title'];
        $about->description = $request['description'];
        $about->created_at = null;
        $about->updated_at = date("Y-m-d H:i:s");

        $about->update();

        return redirect('about')->with('message', 'About updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $about = About::find($id);
        if ($about) {
            $destination = public_path('uploads/' . $about->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $about->delete();
            return redirect('about')->with('message', 'About deleted successfully');
        } else {
            return redirect('about')->with('message', 'No About found to delete');
        }
    }
}
