<?php

namespace App\Providers;

use App\Models\Backend\Category;
use App\Models\Backend\SlideImage;
use App\Models\Backend\TripDetail;

use App\Models\Backend\Herosection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Backend\AffiliatePartner;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('trip_details')) {
            $navtripdetails = \App\Models\Backend\TripDetail::with('category')->select('id', 'category_id',
            'trip_name','trip_slug')->get();
            // dd($navtripdetails->toArray());
            \Illuminate\Support\Facades\View::share('navtripdetails', $navtripdetails);
            
            $limitednavtripdetails = \App\Models\Backend\TripDetail::with('category')
            ->select('id', 'category_id', 'trip_name', 'trip_slug')
            ->latest()
            ->take(4)
            ->get();
            \Illuminate\Support\Facades\View::share('limitednavtripdetails', $limitednavtripdetails);

        }

        if (Schema::hasTable('affiliate_partners')) {
            $affilatedPartners = \App\Models\Backend\AffiliatePartner::get();
            \Illuminate\Support\Facades\View::share('affilatedPartners', $affilatedPartners);
        }

        $sliderimage = Herosection::count();
        View::share('sliderimage', $sliderimage);

        $tripCategory = Category::count();
        View::share('tripcategory', $tripCategory);
        
        $tripDetails = TripDetail::count();
        View::share('tripdetail', $tripDetails);

        
    }
}