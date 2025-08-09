<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function superAdmin()
    {
        return view('dashboard.superadmin.dashboard');
    }

    public function nationalAdmin()
    {
        $user = Auth::user();
        $organistaion = $user->organization;
        $branch = $user->branch;
        return view('dashboard.national.dashboard', compact('branch','organistaion','user'));
    }

    public function wilayaAdmin()
    {
        return view('dashboard.wilaya.dashboard');
    }

    public function communeAdmin()
    {
        return view('dashboard.commune.dashboard');
    }

    public function neighborhoodAdmin()
    {
        return view('dashboard.neighborhood.dashboard');
    }

    public function userDashboard()
    {
        return view('dashboard.user.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
