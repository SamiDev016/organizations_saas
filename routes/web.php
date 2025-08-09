<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NationalAdminController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('homepage');

Route::get('/organisation-request', [HomeController::class, 'organisationRequest'])->name('organisation-request');

Route::post('/organisation-request', [HomeController::class, 'organisationRequestSubmit'])->name('organisation-request.submit');

// Auth routes
Auth::routes();

Route::get('login', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomLoginController::class, 'login'])->name('login.custom');

Route::get('register', [CustomRegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [CustomRegisterController::class, 'register'])->name('register.custom');

Route::post('logout', [DashboardController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if (!$user) return redirect('/login');

    return match ($user->role_id) {
        1 => redirect()->route('dashboard.superadmin.index'),
        2 => redirect()->route('dashboard.national.index'),
        3 => redirect()->route('dashboard.wilaya.index'),
        4 => redirect()->route('dashboard.commune.index'),
        5 => redirect()->route('dashboard.neighborhood.index'),
        default => redirect()->route('dashboard.user.index'),
    };
})->middleware('auth')->name('dashboard');




Route::middleware(['auth', 'role:1'])->prefix('dashboard/superadmin')->name('dashboard.superadmin.')->group(function () {
    Route::get('/', [DashboardController::class, 'superAdmin'])->name('index');
    Route::get('/organisations', [SuperAdminController::class, 'organisations'])->name('organisations');
    Route::get('/organisations/requests', [SuperAdminController::class, 'organisationsRequests'])->name('organisations.requests');
    Route::post('/organisations/requests/approve/{id}', [SuperAdminController::class, 'organisationsRequestsApprove'])->name('organisations.requests.approve');
    Route::post('/organisations/requests/reject/{id}', [SuperAdminController::class, 'organisationsRequestsReject'])->name('organisations.requests.reject');
    Route::get('/organisations/{id}', [SuperAdminController::class, 'organisationsShow'])->name('organisations.show');
    Route::get('/organisations/{id}/edit', [SuperAdminController::class, 'organisationsEdit'])->name('organisations.edit');
    Route::put('/organisations/{id}/update', [SuperAdminController::class, 'organisationsUpdate'])->name('organisations.update');
    Route::get('/users', [SuperAdminController::class, 'users'])->name('users');
});

Route::middleware(['auth', 'role:2'])->prefix('dashboard/national')->name('dashboard.national.')->group(function () {
    Route::get('/', [DashboardController::class, 'nationalAdmin'])->name('index');
    Route::get('/branches', [NationalAdminController::class, 'branches'])->name('branches');
});

Route::middleware(['auth', 'role:3'])->prefix('dashboard/wilaya')->name('dashboard.wilaya.')->group(function () {
    Route::get('/', [DashboardController::class, 'wilayaAdmin'])->name('index');
});

Route::middleware(['auth', 'role:4'])->prefix('dashboard/commune')->name('dashboard.commune.')->group(function () {
    Route::get('/', [DashboardController::class, 'communeAdmin'])->name('index');
});

Route::middleware(['auth', 'role:5'])->prefix('dashboard/neighborhood')->name('dashboard.neighborhood.')->group(function () {
    Route::get('/', [DashboardController::class, 'neighborhoodAdmin'])->name('index');
});

Route::middleware(['auth', 'role:6'])->prefix('dashboard/user')->name('dashboard.user.')->group(function () {
    Route::get('/', [DashboardController::class, 'userDashboard'])->name('index');
});

