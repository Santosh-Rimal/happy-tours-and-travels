<?php

namespace App\Http\Controllers\Frontend;


use Illuminate\Http\Request;
use App\Models\CustomizeTrip;
use App\Models\Backend\TripDetail;
use App\Http\Controllers\Controller;

class CustomizeTripController extends Controller
{
    public function index(){
        $trips=TripDetail::get();
        return view('frontend.customizetrip',compact('trips'));
    }


     public function store(Request $request){
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
        'country' => 'required|string',
        'trip_id' => 'required|exists:trip_details,id',
        'group_size' => 'required|integer|min:1',
        'preferred_start_date' => 'required|date',
        'duration' => 'required|integer|min:1',
        'budget' => 'string',
        'message' => 'nullable|string'
        ]);
        CustomizeTrip::create($request->all());
        return redirect()->route('frontend.customize.trip')->with('success', 'Customize Trip request created!');
     }
    
}