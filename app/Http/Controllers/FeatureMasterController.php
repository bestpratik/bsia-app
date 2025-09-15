<?php

namespace App\Http\Controllers;

use App\Models\FeatureMaster;
use Illuminate\Http\Request;

class FeatureMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = FeatureMaster::orderBy('order_no')->get();
        return view('admin.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order_no' => 'nullable|integer',
        ]);

        $features = new FeatureMaster;

        $features->name = $request->name;
        $features->icon = $request->icon;
        $features->order_no = $request->order_no;
        $features->description = $request->description;

        $features->save();
        return redirect('features')->with('success', 'Feature created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $features = FeatureMaster::find($id);
        return view('admin.feature.edit', compact('features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'order_no' => 'nullable|integer',
        ]);

        $features = FeatureMaster::find($id);

        $features->name = $request->name;
        $features->icon = $request->icon;
        $features->order_no = $request->order_no;
        $features->description = $request->description;

        $features->save();
        return redirect('features')->with('success', 'Feature updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $features = FeatureMaster::find($id);
        $features->delete();
        return redirect('features')->with('success', 'Feature deleted successfully!');
    }
}
