<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function superAdmin()
    {
        return view('dashboard.superadmin.dashboard');
    }

    public function nationalAdmin()
    {
        return view('dashboard.national.dashboard');
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
}
