<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('homepage');
});


// Role-based dashboard routes
Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [DashboardController::class, 'superAdmin'])->name('superadmin.dashboard');
});

Route::middleware(['auth', 'role:nationaladmin'])->group(function () {
    Route::get('/national/dashboard', [DashboardController::class, 'nationalAdmin'])->name('national.dashboard');
});

Route::middleware(['auth', 'role:wilayaadmin'])->group(function () {
    Route::get('/wilaya/dashboard', [DashboardController::class, 'wilayaAdmin'])->name('wilaya.dashboard');
});

Route::middleware(['auth', 'role:communeadmin'])->group(function () {
    Route::get('/commune/dashboard', [DashboardController::class, 'communeAdmin'])->name('commune.dashboard');
});

Route::middleware(['auth', 'role:neighborhoodadmin'])->group(function () {
    Route::get('/neighborhood/dashboard', [DashboardController::class, 'neighborhoodAdmin'])->name('neighborhood.dashboard');
});

require __DIR__.'/auth.php';
