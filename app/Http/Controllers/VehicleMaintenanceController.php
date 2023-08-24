<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Models\VehicleMaintenance;

class VehicleMaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'maintenances' => VehicleMaintenance::paginate(15),
        ];

        return view('vehicle-maintenance.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'vehicles' => Vehicle::all(),
        ];
        return view('vehicle-maintenance.create', $data);
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
            'vehicle_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'cost' => 'required',
            'provider' => 'required',
            'location' => 'required',
        ]);

        $data = [
            'vehicle_id' => $request->vehicle_id,
            'date' => $request->date,
            'type' => $request->type,
            'cost' => $request->cost,
            'provider' => $request->provider,
            'location' => $request->location,
        ];

        $maintenance_created = VehicleMaintenance::create($data);
        if($maintenance_created){
            return back()->with('success' , 'Maintenance has been created');
        } else{
            return back()->with('error' , 'Maintenance has failed to create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleMaintenance $maintenance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleMaintenance $maintenance)
    {
        $data = [
            'maintenance' => $maintenance,
            'vehicles' => Vehicle::all(),
        ];
        return view('vehicle-maintenance.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleMaintenance $maintenance)
    {
        $request->validate([
            'vehicle_id' => 'required',
            'date' => 'required',
            'type' => 'required',
            'cost' => 'required',
            'provider' => 'required',
            'location' => 'required',
        ]);

        $data = [
            'vehicle_id' => $request->vehicle_id,
            'date' => $request->date,
            'type' => $request->type,
            'cost' => $request->cost,
            'provider' => $request->provider,
            'location' => $request->location,
        ];

        $maintenance_updated = VehicleMaintenance::find($maintenance->id)->update($data);
        if($maintenance_updated){
            return back()->with('success' , 'Maintenance has been updated');
        } else{
            return back()->with('error' , 'Maintenance has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleMaintenance  $vehicleMaintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleMaintenance $vehicleMaintenance)
    {
        //
    }
}
