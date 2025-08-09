<?php

namespace App\Http\Controllers;

use App\Models\Branch;
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

    public function organisationsRequestsApprove($id)
    {
        $request = OrganizationRequest::findOrFail($id);
        $request->update([
            'status' => 'approved',
        ]);

        $slug = str_replace(' ', '-', $request->name);
        $organisation = Organization::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'user_id' => $request->user_id,
            'slug' => $slug,
            'type' => 'free',
        ]);

        if($organisation) {
            OrganizationRequest::where('id', $request->id)->delete();
            $user = User::where('id', $request->user_id)->first();
            Branch::create([
                'name' => $request->name,
                'type' => 'national',
                'organization_id' => $organisation->id,
                'parent_branch_id' => null,
            ]);
            $user->update([
                'role_id' => 2,
                'organization_id' => $organisation->id,
                'branch_id' => $organisation->branches->first()->id,
            ]);
        }
        return redirect()->route('dashboard.superadmin.organisations.requests')->with('success', 'Organization request approved successfully');
    }

    public function organisationsEdit($id)
    {
        $organisation = Organization::findOrFail($id);
        $users = User::where('organization_id', $organisation->id)->get();
        return view('dashboard.superadmin.organisationsEdit', compact('organisation', 'users'));
    }

    public function organisationsRequestsReject($id)
    {
        $request = OrganizationRequest::findOrFail($id);
        $request->update([
            'status' => 'rejected',
        ]);
        return redirect()->route('dashboard.superadmin.organisations.requests')->with('success', 'Organization request rejected successfully');
    }

    public function organisationsShow($id)
    {
        $organisation = Organization::findOrFail($id);
        return view('dashboard.superadmin.organisationsShow', compact('organisation'));
    }

    public function organisationsUpdate($id, Request $request)
    {
        $organisation = Organization::findOrFail($id);
        $organisation->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'slug' => $request->slug,
            'type' => $request->type,
            'description' => $request->description,
            'important_links' => $request->important_links,
            'color1' => $request->color1,
            'color2' => $request->color2,
        ]);
        //handle logo and store it in public/images/organisations_logo
        if($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('images/organisations_logo'), $logoName);
            $organisation->update([
                'logo' => $logoName,
            ]);
        }
        if($organisation) {
            return redirect()->route('dashboard.superadmin.organisations')->with('success', 'Organization updated successfully');
        }
    }
}
