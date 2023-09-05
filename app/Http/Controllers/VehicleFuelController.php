<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleFuel;
use Illuminate\Http\Request;

class VehicleFuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'vehicle_fuels' => VehicleFuel::with('vehicle')->get(),
        ];
        return view('vehiclefuel.index', $data);
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
        return view('vehiclefuel.create', $data);
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
            'meter_readings' => 'required',
            'price_per_unit' => 'required',
            'total_fuel' => 'required',
            'location' => 'required',
        ]);

        // dd($request->all());
        $total_price = $request->price_per_unit * $request->total_fuel;
        $data = [
            'vehicle_id' => $request->vehicle_id,
            'date' => $request->date,
            'meter_readings' => $request->meter_readings,
            'price_per_unit' => $request->price_per_unit,
            'total_fuel' => $request->total_fuel,
            'total_price' => $total_price,
            'location' => $request->location,
         ];

         $fuel_created = VehicleFuel::create($data);
         if($fuel_created) {
            return back()->with('success', 'Fuel info has been created');
         } else{
            return back()->with('error', 'Fuel info has failed to create');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleFuel  $vehicleFuel
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleFuel $vehicleFuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleFuel  $vehicleFuel
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleFuel $vehicle_fuel)
    {
        $data = [
            'vehicle_fuel' => $vehicle_fuel,
            'vehicles' => Vehicle::all(),
        ];

        return view('vehiclefuel.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleFuel  $vehicleFuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleFuel $vehicleFuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleFuel  $vehicleFuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleFuel $vehicleFuel)
    {
        //
    }
}
