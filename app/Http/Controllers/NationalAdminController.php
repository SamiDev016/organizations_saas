<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Auth;

class NationalAdminController extends Controller
{
    public function branches()
    {
        $branches = Branch::where('organization_id', Auth::user()->organization_id)
        ->where('parent_branch_id', '!=',null)->get();
        return view('dashboard.national.branches', compact('branches'));
    }
}
