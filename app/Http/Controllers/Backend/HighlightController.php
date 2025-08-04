<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Highlight;
use App\Models\Backend\TripDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreHighlightRequest;
use App\Http\Requests\Backend\UpdateHighlightRequest;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $highlights=Highlight::with('tripDetail')->get();
        return view('backend.highlight.index',compact('highlights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips = TripDetail::pluck('trip_name', 'id');
        // dd($trips);
        return view('backend.highlight.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHighlightRequest $request)
    {
        Highlight::create($request->all());
        return redirect()->route('admin.highlights.index')->with('success', 'Trip Highlights created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Highlight $highlight)
    {
        $highlight->load('tripDetail');
        // dd($highlight->toArray());
        return view('backend.highlight.show',compact('highlight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Highlight $highlight)
    {
        $trips=TripDetail::get();
        return view('backend.highlight.edit',compact('highlight','trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHighlightRequest $request, Highlight $highlight)
    {
        $highlight->update($request->all());
        return redirect()->route('admin.highlights.index')->with('edit_update', 'Trip highlight updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Highlight $highlight)
    {
        $highlight->delete();
        return redirect()->route('admin.highlights.index')->with('delete', 'Trip highlight Deleted successfully.');
    }
}