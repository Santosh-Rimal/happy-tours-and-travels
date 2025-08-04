<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\TrekkingPackage;
use App\Http\Controllers\Controller;

class TrekkingPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $trekkings = TrekkingPackage::latest()->get();
         return view('backend.travelguide.trekkingpackage.index', compact('trekkings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.travelguide.trekkingpackage.ce');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
       'title' => 'required|string|max:255',
       'requirements' => 'required|array',      
       'requirements.*' => 'required|string',
        'tips' => 'required|array',
        'tips.*' => 'required|string',
       ]);

       TrekkingPackage::create($validated);

       return redirect()->route('admin.trekkings.index')
       ->with('success', 'Trekking Package created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrekkingPackage $trekking)
    {
        return view('backend.travelguide.trekkingpackage.ce',compact('trekking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrekkingPackage $trekking)
    {
       return view('backend.travelguide.trekkingpackage.ce',compact('trekking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TrekkingPackage $trekking)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'requirements' => 'required|array',
        'requirements.*' => 'required|string',
        'tips' => 'required|array',
        'tips.*' => 'required|string',
        ]);

        $trekking->update($validated);

        return redirect()->route('admin.trekkings.index')
        ->with('success', 'Trekking Package updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrekkingPackage $trekking)
    {
        $trekking->delete();
        return redirect()->route('admin.visas.index')
        ->with('success', 'Trekking Package deleted successfully!');
    }
}