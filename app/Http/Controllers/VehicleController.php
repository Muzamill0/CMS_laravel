<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'vehicles' => Vehicle::paginate(15),
        ];
        return view('vehicle.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
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
            'number' => 'required',
            'driver_name' => 'required',
            'status' => 'required'
        ]);
        $data = [
            'number' => $request->number,
            'driver_name' => $request->driver_name,
            'status' => $request->status,
        ];

        $vehicle_created = Vehicle::create($data);
        if($vehicle_created){
            return back()->with('success' , 'vehicle has been created');
        } else{
            return back()->with('error' , 'vehicle has failed to create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $data = [
            'vehicle' => $vehicle
        ];

        return view('vehicle.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        // dd($request->all());
        $request->validate([
            'number' => 'required',
            'driver_name' => 'required',
            'status' => 'required'
        ]);
        $data = [
            'number' => $request->number,
            'driver_name' => $request->driver_name,
            'status' => $request->status,
        ];

        $vehicle_updated = Vehicle::find($vehicle->id)->update($data);
        if($vehicle_updated){
            return back()->with('success' , 'vehicle has been updated');
        } else{
            return back()->with('error' , 'vehicle has failed to update');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
