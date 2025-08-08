<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthenticatedSessionController;

Route::get('/', function () {
    return view('homepage');
})->name('homepage');

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

Route::middleware(['auth', 'role:1'])->get('/dashboard/superadmin', [DashboardController::class, 'superAdmin'])->name('dashboard.superadmin');
Route::middleware(['auth', 'role:2'])->get('/dashboard/national', [DashboardController::class, 'nationalAdmin'])->name('dashboard.national');
Route::middleware(['auth', 'role:3'])->get('/dashboard/wilaya', [DashboardController::class, 'wilayaAdmin'])->name('dashboard.wilaya');
Route::middleware(['auth', 'role:4'])->get('/dashboard/commune', [DashboardController::class, 'communeAdmin'])->name('dashboard.commune');
Route::middleware(['auth', 'role:5'])->get('/dashboard/neighborhood', [DashboardController::class, 'neighborhoodAdmin'])->name('dashboard.neighborhood');
Route::middleware(['auth', 'role:6'])->get('/dashboard/user', [DashboardController::class, 'userDashboard'])->name('dashboard.user');

Route::post('logout', [DashboardController::class, 'logout'])
    ->name('logout');


    
Route::get('login', [\App\Http\Controllers\Auth\CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [\App\Http\Controllers\Auth\CustomLoginController::class, 'login'])->name('login.custom');

Route::get('register', [\App\Http\Controllers\Auth\CustomRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [\App\Http\Controllers\Auth\CustomRegisterController::class, 'register'])->name('register.custom');
