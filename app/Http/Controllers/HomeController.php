<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrganizationRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('homepage');
    }

    public function organisationRequest()
    {
        return view('organisation_request');
    }

    public function organisationRequestSubmit(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if(Auth::user()->role_id != 6) {
            return redirect()->route('organisation-request')->with('error', 'You Must Be Normal User To Request An Organization');
        }

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        OrganizationRequest::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => Auth::user()->id,
            'status' => 'pending',
        ]);

        return redirect()->route('homepage')->with('success', 'Organization request submitted successfully');
    }
}
