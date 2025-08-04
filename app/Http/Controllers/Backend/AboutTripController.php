<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\AboutTrip;
use App\Models\Backend\TripDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Backend\StoreAboutTripDetail;
use App\Http\Requests\Backend\UpdateAboutTripDetail;
use App\Http\Requests\Backend\UpdateTripDetailRequest;
use Illuminate\Support\Str;

class AboutTripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouttrips =AboutTrip::with('tripDetail')->get()->map(function ($abouttrip) {
        $abouttrip->trip_description = Str::limit($abouttrip->trip_description, 100);
        return $abouttrip;
        });
      
        return view('backend.abouttrip.index',compact('abouttrips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips=TripDetail::get();
        return view('backend.abouttrip.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAboutTripDetail $request)
    { 
        // dd($request->all());
        $input=$request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('abouttripsimage', 'public');
            $input['image']=$imagePath;
        }
        AboutTrip::create($input);
        return redirect()->route('admin.abouttrips.index')->with('success', 'About Trip created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutTrip $abouttrip)
    {
        $abouttrip->load('tripDetail');
        return view('backend.abouttrip.show',compact('abouttrip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutTrip $abouttrip)
    {
        $trips=TripDetail::get();
        return view('backend.abouttrip.edit',compact('abouttrip','trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAboutTripDetail $request, AboutTrip $abouttrip)
    {
        $data=$request->all();
        // dd($request->hasFile('image'));
        if ($request->hasFile('image')) {
        if ($abouttrip->image && file_exists(storage_path('app/public/' . $abouttrip->image))) {
@unlink(storage_path('app/public/' . $abouttrip->image));
            }
            $data['image'] = $request->file('image')->store('abouttripsimage', 'public');
            }
            $abouttrip->update($data);

            return redirect()->route('admin.abouttrips.index')->with('edit_update', 'Trip updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutTrip $abouttrip)
    {
        // dd($abouttrip);
        if ($abouttrip->image) {
        $path = storage_path('app/public/' . $abouttrip->image);
        if (file_exists($path)) {
@unlink($path);
            }
            }

        $abouttrip->delete();
        
        return redirect()->route('admin.abouttrips.index')->with('delete', 'Trip highlight Deleted successfully.');
    }
}