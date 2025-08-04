<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\VisaController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\SaftyController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Backend\SeasonController;
use App\Http\Controllers\Backend\FeatureController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\IncludedController;
use App\Http\Controllers\Backend\AboutTripController;
use App\Http\Controllers\Backend\HighlightController;
use App\Http\Controllers\Backend\ItineraryController;
use App\Http\Controllers\Backend\RecentCsrController;
use App\Http\Controllers\Backend\CulturalDoController;
use App\Http\Controllers\Backend\PreventionController;
use App\Http\Controllers\Backend\TeamMemberController;
use App\Http\Controllers\Backend\TripDetailController;
use App\Http\Controllers\Backend\HerosectionController;
use App\Http\Controllers\Backend\NotIncludedController;
use App\Http\Controllers\Backend\CulturalDoNotController;
use App\Http\Controllers\Backend\AltitudeSicknesControllrt;
use App\Http\Controllers\Backend\TrekkingPackageController;
use App\Http\Controllers\Backend\AffiliatePartnerController;
use App\Http\Controllers\Backend\UsefulInformationdController;
use App\Http\Controllers\Backend\CorporateResponsibilityController;



Route::get('/index', function () {
return view('frontend.index');
});



Route::get('admin/dashboard',function(){
    return view('backend.dashboard.dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth','verified'])->group(function(){
    Route::resource('tripdetails',TripDetailController::class);
    Route::resource('highlights',HighlightController::class);
    Route::resource('abouttrips',AboutTripController::class);
    Route::resource('itineraries',ItineraryController::class);
    Route::resource('includes',IncludedController::class);
    Route::resource('notincludes',NotIncludedController::class);
    Route::resource('usefulinformations',UsefulInformationdController::class);
    Route::resource('affiliatedpartners',AffiliatePartnerController::class);
    Route::resource('herosections',HerosectionController::class);
    Route::resource('categories',CategoryController::class);
    Route::resource('blogs',BlogController::class);
    Route::resource('galleries',GalleryController::class);
    Route::resource('abouts',AboutController::class);
    Route::resource('teams',TeamMemberController::class);
    Route::resource('features',FeatureController::class);
    Route::resource('Videos',VideoController::class);
    Route::resource('corporateresponsibilites',CorporateResponsibilityController::class);
    Route::resource('csrs',RecentCsrController::class);
    Route::resource('seasons',SeasonController::class);
    Route::resource('visas',VisaController::class);
    Route::resource('trekkings',TrekkingPackageController::class);
    Route::resource('altitudesickness',AltitudeSicknesControllrt::class);
    Route::resource('preventions',PreventionController::class);
    Route::resource('safetymeasures',SaftyController::class);
    Route::resource('culturaldoes',CulturalDoController::class);
    Route::resource('culturaldoesnots',CulturalDoNotController::class);
});

require __DIR__.'/auth.php';
require __DIR__.'/frontend.php';