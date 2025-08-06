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
    //    dd($trips->toArray());
       return view('backend.customizetrip.index', compact('trips'));
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomizeTrip $customizetrip)
    {
        return view('backend.customizetrip.show',compact('customizetrip'));
    }


    public function destroy(CustomizeTrip $customizetrip)
    {
        $customizetrip->delete();
        return redirect()->route('admin.customizetrips.index')->with('success', 'Customize Trip request deleted successfully!');
    }
}