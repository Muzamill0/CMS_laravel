<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $data = [
            'organizations'  => Organization::paginate(20),
        ];
        return view('organization.index', $data);
    }

    public function create()
    {
        return view('organization.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'ph_no' => $request->ph_no,
        ];

        $org_created = Organization::create($data);

        if($org_created){
            return back()->with('success' , 'Organization has been created');
        } else{
            return back()->with('error' , 'Organization has failed to create');
        }
    }

    public function edit(Organization $organization)
    {
        $data = [
            'organization' => $organization,
        ];
        return view('organization.edit', $data);
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'location' => $request->location,
            'ph_no' => $request->ph_no,
        ];

        $org_updated = Organization::find($organization->id)->update($data);

        if($org_updated){
            return back()->with('success' , 'Organization has been updated');
        } else{
            return back()->with('error' , 'Organization has failed to update');
        }
    }
}
