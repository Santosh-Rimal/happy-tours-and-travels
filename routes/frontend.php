<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\frontend\GalleryController;
use App\Http\Controllers\Frontend\DestinationController;
use App\Http\Controllers\Frontend\travelGuideController;
use App\Http\Controllers\Frontend\CustomizeTripController;
use App\Http\Controllers\Frontend\Corporate_Responsibility;

Route::get('/',[IndexController::class,'index'])->name('frontend.index');
Route::get('/blogs',[BlogController::class,'index'])->name('frontend.blogs');
Route::get('/blogs/{slug}',[BlogController::class,'show'])->name('frontend.blogs.show');

Route::get('/gallery', [GalleryController::class, 'index'])->name('frontend.gallery');

Route::get('/about-us', [AboutController::class, 'index'])->name('frontend.about');


Route::get('/contact-us',[ContactController::class,'index'])->name('frontend.contact.us');
Route::post('/contact-us/store',[ContactController::class,'store'])->name('frontend.contact.us.store');

Route::get("/video", [VideoController::class, 'index'])->name("frontend.video");

Route::get('/customize-trip', [CustomizeTripController::class, 'index'])->name('frontend.customize.trip');
Route::post('/customize-trip/store', [CustomizeTripController::class, 'store'])->name('frontend.customize.trip.store');

Route::get("/corporate-responsibility", [Corporate_Responsibility::class,
'index'])->name("frontend.corporate_responsibility");

Route::get("/destination", [DestinationController::class,'index'])->name('frontend.destination');

Route::get('/travel-guide',[travelGuideController::class,'index'])->name('frontend.travel.guide');

Route::get('/trip/{slug}', [IndexController::class,'single'])->name('frontend.trip.show');

Route::get('/customize-trip/{id}', [CustomizeTripController::class, 'customizebyid'])->name('frontend.customize.trip.customize');