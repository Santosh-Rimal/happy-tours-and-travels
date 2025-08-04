<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\TripDetail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreUsefullInformationRequest;
use App\Http\Requests\Backend\UpdateUsefullInformationReques;
use App\Models\Backend\UsefulInformation;

class UsefulInformationdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usefulinformations=UsefulInformation::get();
        return view('backend.usefulinformation.index',compact('usefulinformations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips=TripDetail::get();
        return view('backend.usefulinformation.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsefullInformationRequest $request)
    {

        UsefulInformation::create($request->all(0));
        return redirect()->route('admin.usefulinformations.index')->with('success', 'Trip Information created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UsefulInformation $usefulinformation)
    {
        $usefulinformation->load('tripDetail');
        return view('backend.usefulinformation.show',compact('usefulinformation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsefulInformation $usefulinformation)
    {
        $trips=TripDetail::get();
        return view('backend.usefulinformation.edit',compact('usefulinformation','trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsefullInformationReques $request, UsefulInformation $usefulinformation)
    {

            $usefulinformation->update($request->all());

            return redirect()->route('admin.usefulinformations.index')->with('edit_update', 'Trip Information updated
            successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsefulInformation $usefulinformation)
    {
            $usefulinformation->delete();
            return redirect()->route('admin.usefulinformations.index')->with('delete', 'Trip Information Deleted
            successfully.');
    }
}