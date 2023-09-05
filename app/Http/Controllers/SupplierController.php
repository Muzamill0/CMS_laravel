<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'suppliers' => Supplier::paginate(20),
        ];

        return view('suppliers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'name' => 'required| unique:suppliers,name',
            'email' => 'required| unique:suppliers,email',
            'phone_no' => 'required| unique:suppliers,phone_no',
            'mobile_no' => 'required| unique:suppliers,mobile_no',
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

        $supplier_created = Supplier::create($data);
        if($supplier_created){
            return back()->with('success' , 'Supplier has been created');
        } else{
            return back()->with('error' , 'Supplier has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $data = [
            'supplier' => $supplier,
        ];
        return view('suppliers.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required|unique:suppliers,name,' . $supplier->id . ',id',
            'email' => 'required|unique:suppliers,email,' . $supplier->id . ',id',
            'phone_no' => 'required|unique:suppliers,phone_no,' . $supplier->id . ',id',
            'mobile_no' => 'required|unique:suppliers,mobile_no,' . $supplier->id . ',id',
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

        $supplier_updated = Supplier::find($supplier->id)->update($data);
        if($supplier_updated){
            return back()->with('success' , 'Supplier has been updated');
        } else{
            return back()->with('error' , 'Supplier has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
