<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'purchases' => PurchaseOrder::with('supplier','vehicle', 'project')->get(),
        ];
        // dd($data);

        return view('purchase-order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'suppliers' => Supplier::where('status' , 1)->get(),
            'projects' => Project::where('status' , 1)->get(),
            'vehicles' => Vehicle::where('status' , 1)->get(),
        ];

        return view('purchase-order.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'supplier_id',
            'project_id',
            'vehicle_id',
            'quantity',
            'price_per_unit',
            'date',
        ]);

        $total_cost = $request->quantity * $request->price_per_unit;

        $data = [
            'supplier_id' => $request->supplier,
            'project_id' => $request->project,
            'vehicle_id' => $request->vehicle,
            'product_name' => $request->name,
            'quantity' => $request->quantity,
            'price_per_unit' => $request->price_per_unit,
            'total_cost' => $total_cost,
            'date' => $request->date,
        ];

        $purchase_created = PurchaseOrder::create($data);
        if($purchase_created){
            return back()->with('success' , 'Purchase has been created');
        } else {
            return back()->with('error' , 'Purchase has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchase)
    {
        $data = [
            'suppliers' => Supplier::where('status' , 1)->get(),
            'projects' => Project::where('status' , 1)->get(),
            'vehicles' => Vehicle::where('status' , 1)->get(),
            'purchase' => $purchase,
        ];
        return view('purchase-order.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchase)
    {
        // dd($request->all());
        $request->validate([
            'supplier_id',
            'project_id',
            'vehicle_id',
            'quantity',
            'price_per_unit',
            'date',
        ]);

        $total_cost = $request->quantity * $request->price_per_unit;

        $data = [
            'supplier_id' => $request->supplier,
            'project_id' => $request->project,
            'vehicle_id' => $request->vehicle,
            'product_name' => $request->name,
            'quantity' => $request->quantity,
            'price_per_unit' => $request->price_per_unit,
            'total_cost' => $total_cost,
            'date' => $request->date,
        ];

        $purchase_updated = PurchaseOrder::find($purchase->id)->update($data);
        if($purchase_updated){
            return back()->with('success' , 'Purchase has been updated');
        } else {
            return back()->with('error' , 'Purchase has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
