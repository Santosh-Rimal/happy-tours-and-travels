<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\TripDetail;
use App\Models\Backend\NotIncluded;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\StoreNotIncludedRequest;
use App\Http\Requests\Backend\StorenNotIncludedRequest;
use App\Http\Requests\Backend\UpdateNotIncludedRequest;

class NotIncludedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notincludes=NotIncluded::with('tripDetail')->get();
        // dd($includes->toArray());
        return view('backend.notinclude.index',compact('notincludes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $trips=TripDetail::get();
        return view('backend.notinclude.create',compact('trips'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotIncludedRequest $request)
    {
        NotIncluded::create($request->all());
        return redirect()->route('admin.notincludes.index')->with('success', 'Trip notinclusion created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(NotIncluded $notinclude)
    {
        $notinclude->load('tripDetail');
        return view('backend.notinclude.show',compact('notinclude'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotIncluded $notinclude)
    {
        $trips=TripDetail::get();
        return view('backend.notinclude.edit',compact('notinclude','trips'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotIncludedRequest $request, NotIncluded $notinclude)
    {
        $notinclude->update($request->all());
        return redirect()->route('admin.notincludes.index')->with('edit_update', 'Trip inclusion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotIncluded $notinclude)
    {
        $notinclude->delete();
        return redirect()->route('admin.notincludes.index')->with('delete', 'Trip highlight Deleted successfully.');
    }
}