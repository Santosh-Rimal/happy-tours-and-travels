<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('auth.auth');
})->name('login');


Route::post('/login', [App\Http\Controllers\auth\AuthController::class, 'authenticate'])->name('login.post');

Route::post('/logout', [App\Http\Controllers\auth\AuthController::class, 'logout'])->name('logout');