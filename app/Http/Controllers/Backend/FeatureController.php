<?php

namespace App\Http\Controllers\Backend;

use App\Models\Feature;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreFeatureRequest;
use App\Http\Requests\Backend\UpdateFeatureRequest;


class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::orderBy('order')->get();
        return view('backend.feature.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('backend.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFeatureRequest $request)
    {
        $validated = $request->all();

        Feature::create($validated);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        return view('backend.feature.show', compact('feature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
       return view('backend.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFeatureRequest $request, Feature $feature)
    {
        $validated = $request->all();

        $feature->update($validated);

        return redirect()->route('admin.features.index')
            ->with('success', 'Feature updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
         $feature->delete();

         return redirect()->route('admin.features.index')
         ->with('success', 'Feature deleted successfully!');
    }
}