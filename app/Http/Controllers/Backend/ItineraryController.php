<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Itinerary;
use App\Models\Backend\TripDetail;
use App\Http\Controllers\Controller;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itineraries=Itinerary::with('tripDetail')->get();
        return view('backend.itinerary.index',compact('itineraries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips=TripDetail::get();
        return view('backend.itinerary.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Itinerary::create($request->all());
        return redirect()->route('admin.itineraries.index')->with('success', 'Trip Highlights created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Itinerary $itinerary)
    {
        return view('backend.itinerary.show',compact('itinerary'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Itinerary $itinerary)
    {
        $trips=TripDetail::get();
        return view('backend.itinerary.edit',compact('itinerary','trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Itinerary $itinerary)
    {
        $itinerary->update($request->all());
        return redirect()->route('admin.itineraries.index')->with('edit_update', 'Trip highlight updated
        successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Itinerary $itinerary)
    {
        $itinerary->delete();
        return redirect()->route('admin.itineraries.index')->with('delete', 'Trip highlight Deleted successfully.');
    }
}