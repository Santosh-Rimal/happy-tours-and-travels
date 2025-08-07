<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\TripDetail;
use App\Models\Backend\Herosection;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {

        $blogs = Blog::latest()->limit(3)->get();
        $galleries = Gallery::latest()->limit(3)->get(); 
        // $tripdetails=TripDetail::with('category')->select('id','category_id','trip_name')->get();
        $category=Category::latest()->select('id')->first();
        // dd($category_id);
        $tripdetails = TripDetail::with('category')->where('category_id',$category->id)->inRandomOrder()->limit(6)->get();
        // dd($tripdetails->toArray());
        $herosections=Herosection::get();
        // dd($herosections);

        $recommandations = TripDetail::with('category')->orderBy('id', 'desc')->limit(6)->get();

        return view('frontend.index',compact('tripdetails','herosections','recommandations', 'blogs', 'galleries'));
    }

    public function single($trip_slug)
    {
        $tripdetail = TripDetail::with('category','usefilinformation','notincludes','includes','itineray','aboutTrip','highlights')->where('trip_slug', $trip_slug)->firstOrFail();
        return view('frontend.single', compact('tripdetail'));
        
    }


    public function recommend()
    {
       dd("Hello");
    }

   
}