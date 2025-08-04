<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CorporateResponsibility;
use App\Models\RecentCsr;
use Illuminate\Http\Request;

class Corporate_Responsibility extends Controller
{
    public function index()
    {
        $corporates=CorporateResponsibility::get();
        $csrs=RecentCsr::get();
        return view('frontend.corporate_responsibility',compact('corporates','csrs'));
    }
}