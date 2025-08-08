<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    public function organisations()
    {
        $organisations = Organization::all();
        return view('dashboard.superadmin.organisations', compact('organisations'));
    }

    public function organisationsRequests()
    {
        $requests = OrganizationRequest::where('status', '!=', 'rejected')->get();
        return view('dashboard.superadmin.organisationsRequests', compact('requests'));
    }

    public function users()
    {
        $users = User::all();
        return view('dashboard.superadmin.users', compact('users'));
    }
}
