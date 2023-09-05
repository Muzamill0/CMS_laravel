<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'customers' => Customer::paginate(20),
        ];

        return view('customer.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required| unique:customers,name',
            'email' => 'required| unique:customers,email',
            'phone_no' => 'required| unique:customers,phone_no',
            'mobile_no' => 'required| unique:customers,mobile_no',
            'address' => 'required',
            'ntn_no' => 'required',
        ]);

        $data = [
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'ntn_no' => $request->ntn_no,
            'strn_no' => $request->strn_no,
            'fax_no' => $request->fax_no,
            'status' => 1,
        ];

        $customer_created = Customer::create($data);
        if($customer_created){
            return back()->with('success' , 'Customer has been created');
        } else{
            return back()->with('error' , 'Customer has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $data = [
            'customer' => $customer
        ];
        return view('customer.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|unique:suppliers,name,' . $customer->id . ',id',
            'email' => 'required|unique:customers,email,' . $customer->id . ',id',
            'phone_no' => 'required|unique:customers,phone_no,' . $customer->id . ',id',
            'mobile_no' => 'required|unique:customers,mobile_no,' . $customer->id . ',id',
            'address' => 'required',
            'ntn_no' => 'required',
            'status' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'contact_person' => $request->contact_person,
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
            'phone_no' => $request->phone_no,
            'address' => $request->address,
            'ntn_no' => $request->ntn_no,
            'strn_no' => $request->strn_no,
            'fax_no' => $request->fax_no,
            'status' => $request->status,
        ];

        $customer_updated = Customer::find($customer->id)->update($data);
        if($customer_updated){
            return back()->with('success' , 'Customer has been updated');
        } else{
            return back()->with('error' , 'Customer has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
