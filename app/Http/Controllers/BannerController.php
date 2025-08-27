<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banner = Banner::all();
        return view('admin.banner.index', compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $banner = new Banner;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $banner->image = $filename;
        }

        $banner->type = $request['type'];
        $banner->title = $request['title'];
        $banner->sub_title = $request['sub_title'];
        $banner->video_url = $request->type === 'video' ? $request->video_url : null;
        $banner->button_text_one = $request['button_text_one'];
        $banner->button_link_one = $request['button_link_one'];
        $banner->button_text_two = $request['button_text_two'];
        $banner->button_link_two = $request['button_link_two'];
        $banner->created_at = date("Y-m-d H:i:s");
        $banner->updated_at = null;

        $banner->save();

        return redirect('banner')->with('message', 'Banner added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        $banner = Banner::find($id);
        
        if ($request->hasFile('image')) {
            if ($banner->image) {
                $destination = public_path('uploads/' . $banner->image);
                if (File::exists($destination)) {
                    File::delete($destination);
                }
            }

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $banner->image = $filename;
        }

        $banner->type = $request['type'];
        $banner->title = $request['title'];
        $banner->sub_title = $request['sub_title'];
        $banner->video_url = $request->type === 'video' ? $request->video_url : null;
        $banner->button_text_one = $request['button_text_one'];
        $banner->button_link_one = $request['button_link_one'];
        $banner->button_text_two = $request['button_text_two'];
        $banner->button_link_two = $request['button_link_two'];
        $banner->created_at = null;
        $banner->updated_at = date("Y-m-d H:i:s");
        
        $banner->update();

        return redirect('banner')->with('message', 'Banner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);
        if ($banner) {
            $destination = public_path('uploads/' . $banner->image);
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $banner->delete();
            return redirect('banner')->with('message', 'Banner deleted successfully');
        } else {
            return redirect('banner')->with('message', 'No banner found to delete');
        }
    }
}
