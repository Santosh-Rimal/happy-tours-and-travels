<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreTripDetailRequest;
use App\Http\Requests\Backend\UpdateTripDetailRequest;
use App\Models\Backend\Category;
use App\Models\Backend\TripDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TripDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tripdetails=TripDetail::with('category')->paginate(6);
        // dd($tripdetails->toArray());
        return view('backend.tripdetail.index', compact('tripdetails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Category::pluck('name', 'id');
        return view('backend.tripdetail.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTripDetailRequest $request)
    {
        $tripdetails=$request->all();
        // dd($tripdetails);
        if ($request->hasFile('sliderimage')) {
            $imagePath = $request->file('sliderimage')->store('tripsliderimage', 'public');
            $tripdetails['sliderimage']=$imagePath;
        }
        $tripdetails['trip_slug']=Str::slug($request->trip_name, '-');
       TripDetail::create($tripdetails);
       return redirect()->route('admin.tripdetails.index')->with('success', 'Trip detail created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(TripDetail $tripdetail)
    {
        // dd($tripdetail);
        return view('backend.tripdetail.show',compact('tripdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TripDetail $tripdetail)
    {
        $categories= Category::pluck('name', 'id');
        return view('backend.tripdetail.edit',compact('tripdetail','categories'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTripDetailRequest $request, TripDetail $tripdetail)
{
    // dd($request->all());
    $edittripdetail = $request->all();
// dd($request->hasFile('sliderimage'));
    if ($request->hasFile('sliderimage')) {
        if ($tripdetail->sliderimage && file_exists(storage_path('app/public/' . $tripdetail->sliderimage))) {
            // dd(storage_path('app/public/' . $tripdetail->sliderimage));
@unlink(storage_path('app/public/' . $tripdetail->sliderimage));
// dd("HEllo");
}
$edittripdetail['sliderimage'] = $request->file('sliderimage')->store('tripsliderimage', 'public');
    }

    $edittripdetail['trip_slug'] = Str::slug($request->trip_name, '-');
    $tripdetail->update($edittripdetail);

    return redirect()->route('admin.tripdetails.index')->with('edit_update', 'Trip detail updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TripDetail $tripdetail)
    {

           if ($tripdetail->sliderimage) {
        $path = storage_path('app/public/' . $tripdetail->sliderimage);
        if (file_exists($path)) {
@unlink($path);
            }
            }
        $tripdetail->delete();
        return redirect()->route('admin.tripdetails.index')->with('delete', 'Trip detail Deleted successfully.');
    }

    public function recommend(Request $request, $id)
    {
        // dd($request->all());
    $trip = TripDetail::findOrFail($id);
    $trip->update([
    'is_recommend' => $request->is_recommend
    ]);

    return back()->with('edit_update', 'Trip recommendation status updated!');
    }
}