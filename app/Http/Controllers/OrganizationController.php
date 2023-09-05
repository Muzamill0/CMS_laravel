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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'owner_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile_no' => 'required',
            'ph_no' => 'required',
        ]);

        $logo = $request->logo;

        if ($logo) {
            $logo_name = 'logo-' . time() . '.' . $logo->getClientOriginalExtension();
        } else {
            $logo_name = '';
        }

        $data = [
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile_no' => $request->mobile_no,
            'ph_no' => $request->ph_no,
            'sales_tax_no' => $request->sales_tax_no,
            'ntn_no' => $request->ntn_no,
            'tag_line' => $request->tag_line,
            'logo' => $logo_name,
        ];

        $org_created = Organization::create($data);

        if($org_created){
            if($logo){
                $logo->move(public_path('logos'), $logo_name);
            }
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
            'owner_name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'mobile_no' => 'required',
            'ph_no' => 'required',
        ]);

        $logo = $request->logo;

        if ($logo) {
            $logo_name = 'logo-' . time() . '.' . $logo->getClientOriginalExtension();
        } else {
            $logo_name = $organization->logo;
        }

        $data = [
            'name' => $request->name,
            'owner_name' => $request->owner_name,
            'email' => $request->email,
            'address' => $request->address,
            'mobile_no' => $request->mobile_no,
            'ph_no' => $request->ph_no,
            'sales_tax_no' => $request->sales_tax_no,
            'ntn_no' => $request->ntn_no,
            'tag_line' => $request->tag_line,
            'logo' => $logo_name,
        ];

        $org_updated = Organization::find($organization->id)->update($data);

        if($org_updated){
            $last_logo = public_path('logos') . '/' . $organization->logo;
            if (file_exists($last_logo)) {
                unlink($last_logo);
            }
            if($logo){
                $logo->move(public_path('logos'), $logo_name);
            }
            return back()->with('success' , 'Organization has been updated');
        } else{
            return back()->with('error' , 'Organization has failed to update');
        }
    }
}
