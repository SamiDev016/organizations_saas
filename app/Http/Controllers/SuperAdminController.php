<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function organisations()
    {
        return view('dashboard.superadmin.organisations');
    }

    public function users()
    {
        return view('dashboard.superadmin.users');
    }
}
