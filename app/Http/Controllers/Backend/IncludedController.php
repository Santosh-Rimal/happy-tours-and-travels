<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Included;
use App\Models\Backend\TripDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreIncludedRequest;
use App\Http\Requests\Backend\UpdateIncludedRequest;

class IncludedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $includes=Included::with('tripDetail')->get();
        return view('backend.include.index',compact('includes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips = TripDetail::pluck('trip_name', 'id');
        return view('backend.include.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncludedRequest $request)
    {
        Included::create($request->all());
        return redirect()->route('admin.includes.index')->with('success', 'Trip inclusion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Included $include)
    {
        $include->load('tripDetail');
        return view('backend.include.show',compact('include'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Included $include)
    {
        $trips=TripDetail::get();
        return view('backend.include.edit',compact('include','trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncludedRequest $request, Included $include)
    {
        $include->update($request->all());
        return redirect()->route('admin.includes.index')->with('edit_update', 'Trip inclusion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Included $include)
    {
        $include->delete();
        return redirect()->route('admin.includes.index')->with('delete', 'Trip highlight Deleted successfully.');
    }
}