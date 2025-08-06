<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\TripDetail;
use App\Models\CustomizeTrip;
use Illuminate\Http\Request;

class CustomizeTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $trips = CustomizeTrip::with('tripDetail')->latest()->get();
       return view('backend.customizetrip.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips=TripDetail::get();
        return view('backend.customizetrip.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
       'name' => 'required|string|max:255',
       'email' => 'required|email',
       'phone' => 'required|string',
       'country' => 'required|string',
       'trip_id' => 'required|exists:trips,id',
       'group_size' => 'required|integer|min:1',
       'preferred_start_date' => 'required|date',
       'duration' => 'required|integer|min:1',
       'budget' => 'required|numeric',
       'message' => 'nullable|string'
       ]);

       CustomizeTrip::create($request->all());
       return redirect()->route('customize-trips.index')->with('success', 'Trip request created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomizeTrip $customizeTrip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomizeTrip $customizeTrip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomizeTrip $customizeTrip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomizeTrip $customizeTrip)
    {
        //
    }
}