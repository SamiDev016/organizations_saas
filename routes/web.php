<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('homepage');
});

Auth::routes();

Route::get('/dashboard', function () {
    $user = auth()->user();

    if (!$user) {
        return redirect('/login');
    }

    switch ($user->role_id) {
        case 1:
            return redirect()->route('dashboard.superadmin');
        case 2:
            return redirect()->route('dashboard.national');
        case 3:
            return redirect()->route('dashboard.wilaya');
        case 4:
            return redirect()->route('dashboard.commune');
        case 5:
            return redirect()->route('dashboard.neighborhood');
        default:
            return redirect()->route('dashboard.user');
    }
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/superadmin', [DashboardController::class, 'superAdmin'])->name('dashboard.superadmin');
    Route::get('/dashboard/national', [DashboardController::class, 'nationalAdmin'])->name('dashboard.national');
    Route::get('/dashboard/wilaya', [DashboardController::class, 'wilayaAdmin'])->name('dashboard.wilaya');
    Route::get('/dashboard/commune', [DashboardController::class, 'communeAdmin'])->name('dashboard.commune');
    Route::get('/dashboard/neighborhood', [DashboardController::class, 'neighborhoodAdmin'])->name('dashboard.neighborhood');
    Route::get('/dashboard/user', [DashboardController::class, 'userDashboard'])->name('dashboard.user');
});
