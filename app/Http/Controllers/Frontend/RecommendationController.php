<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Backend\TripDetail;
use App\Models\Backend\Herosection;
use App\Http\Controllers\Controller;

class RecommendationController extends Controller
{
    public function index()
    {
         $herosections=Herosection::get();
        $tripdetails = TripDetail::with('category')
            ->where('is_recommend', true)
            ->orderBy('id', 'desc')
            ->limit(6)
            ->get();
            $recommandations=[];
             $blogs = Blog::latest()->limit(3)->get();
              $galleries = Gallery::latest()->limit(3)->get();
        return view('frontend.recommendation',
        compact('tripdetails','herosections','recommandations','blogs','galleries'));
    }
}