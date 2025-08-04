<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Visa;
use App\Models\Safty;
use App\Models\Season;
use App\Models\Prevention;
use Illuminate\Http\Request;
use App\Models\AltitudeSicknes;
use App\Models\TrekkingPackage;
use App\Http\Controllers\Controller;
use App\Models\CulturalDo;
use App\Models\CulturalDoNot;

class travelGuideController extends Controller
{
    public function index()
    {
        $peak_seasons=Season::where('category','peak_seasons')->get();
        $other_seasons=Season::where('category','other_seasons')->get();
        $visas=Visa::get();
        $TrekkingPackages=TrekkingPackage::get();
        $symptoms= AltitudeSicknes::get();
        $preventions=Prevention::get();
        $safties=Safty::get();
        $culuturaldoes=CulturalDo::get();
        $culuturaldoesnots=CulturalDoNot::get();
        
         return
         view('frontend.travel-guide',compact('peak_seasons','other_seasons','visas','TrekkingPackages','symptoms','preventions','safties','culuturaldoes','culuturaldoesnots'));
    }
}