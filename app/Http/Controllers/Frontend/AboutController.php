<?php

namespace App\Http\Controllers\Frontend;

use App\Models\About;
use App\Models\Feature;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
         $abouts = About::get();

        //  dd($abouts->toArray());
         $teamMembers = TeamMember::orderBy('order')->get();
         $features = Feature::orderBy('order')->get();

         return view('frontend.about', compact('abouts','teamMembers','features'));
    }
}