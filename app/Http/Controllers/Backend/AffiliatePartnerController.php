<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\AffiliatePartner;
use App\Http\Requests\Backend\StoreAffiliatePartnerRequest;
use App\Http\Requests\Backend\UpdateAffiliatePartnerRequest;

class AffiliatePartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affiliatedpartners = AffiliatePartner::get()->map(function ($partner) {
            $partner->description = Str::limit($partner->description, 100);
            return $partner;
        });
    
        return view('backend.affilatedpartner.index',compact('affiliatedpartners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.affilatedpartner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAffiliatePartnerRequest $request)
    {
        $input=$request->all();
        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('tripaffiliatedpartners', 'public');
        }
        $input['image']=$imagePath;
        AffiliatePartner::create($input);
        return redirect()->route('admin.affiliatedpartners.index')->with('success', 'Trip AffiliatedPartner created
        successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AffiliatePartner $affiliatedpartner)
    {
        return view('backend.affilatedpartner.show',compact('affiliatedpartner'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AffiliatePartner $affiliatedpartner)
    {
        return view('backend.affilatedpartner.edit',compact('affiliatedpartner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAffiliatePartnerRequest $request, AffiliatePartner $affiliatedpartner)
    {
        $data=$request->all();
        if ($request->hasFile('image')) {
        if ($affiliatedpartner->image && file_exists(storage_path('app/public/' . $affiliatedpartner->image))) {
@unlink(storage_path('app/public/' . $affiliatedpartner->image));
            }
            $data['image'] = $request->file('image')->store('tripaffiliatedpartners', 'public');
            }
            $affiliatedpartner->update($data);

            return redirect()->route('admin.affiliatedpartners.index')->with('edit_update',
            'AffiliatedPartner updated
            successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AffiliatePartner $affiliatedpartner)
    {
          // dd($abouttrip);
          if ($affiliatedpartner->image) {
          $path = storage_path('app/public/' . $affiliatedpartner->image);
          if (file_exists($path)) {
@unlink($path);
              }
              }

              $affiliatedpartner->delete();

              return redirect()->route('admin.affiliatedpartners.index')->with('delete', ' AffiliatedPartner Deleted
              successfully.');
    }
}