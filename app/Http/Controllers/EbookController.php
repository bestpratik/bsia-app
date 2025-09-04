<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EbookController extends Controller
{
    /**
     * Display a listing of the resource.  
     */
    public function index()
    {
        $ebook = Ebook::all();
        return view('admin.ebook.index', compact('ebook'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ebook.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);

        $ebook = new Ebook;

        if ($request->hasfile('featured_image')) {
            $file = $request->file('featured_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $ebook->featured_image = $filename;
        }

        $slug = Str::slug($request['title']);
        $ebook->title = $request['title'];
        $ebook->slug = $slug;
        $ebook->description = $request->description;
        $ebook->price = $request->price;
        $ebook->author = $request->author;
        $ebook->status = 1;

        $ebook->save();
        return redirect('ebook')->with('success', 'Ebook created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $ebook = Ebook::find($id);
        return view('admin.ebook.show', compact('ebook'));
    }

    public function toggleStatus($id)
    {
        $ebook = Ebook::find($id);
        $ebook->status = !$ebook->status;
        $ebook->save();

        return redirect('ebook')->with('success', 'Ebook status updated successfully.');
    } 

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $ebook = Ebook::find($id);
        return view('admin.ebook.edit', compact('ebook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $ebook = Ebook::find($id);

        if ($request->hasfile('featured_image')) {

            //Delete previous file
            $destination = public_path('uploads/' . $ebook->featured_image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('featured_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $ebook->featured_image = $filename;
        }

        $slug = Str::slug($request['title']);
        $ebook->title = $request['title'];
        $ebook->slug = $slug;
        $ebook->description = $request->description;
        $ebook->price = $request->price;
        $ebook->author = $request->author;
        // $ebook->status = $request->status;

        $ebook->update();
        return redirect('ebook')->with('success', 'Ebook updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         $ebook = Ebook::find($id);
        if ($ebook) {
            $destination = public_path('uploads/' . $ebook->featured_image);
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $ebook->delete();
            return redirect('ebook')->with('success', 'Ebook deleted successfully!');
        } else {
            return redirect('ebook')->with('success', 'No Ebook found to be deleted!');
        }
    }
}
