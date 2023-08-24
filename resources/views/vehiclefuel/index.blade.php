@extends('layout.main')

@section('title', 'Vehicle_fuels')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Vehicle Fuel</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicle.fuel.create') }}" class="btn btn-outline-primary">Add Fuel Info</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($vehicle_fuels) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Vehicle Number</th>
                    <th>Date</th>
                    <th>Meter Readings</th>
                    <th>Price Per Unit</th>
                    <th>Total Fuel</th>
                    <th>Total Price</th>
                    <th>location</th>
                    <th>Action</th>
                </tr>
                @foreach ($vehicle_fuels as $vehicle_fuel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vehicle_fuel->vehicle->number }}</td>
                    <td>{{ $vehicle_fuel->date }}</td>
                    <td>{{ $vehicle_fuel->meter_readings }}</td>
                    <td>{{ $vehicle_fuel->price_per_unit }}</td>
                    <td>{{ $vehicle_fuel->total_fuel }}</td>
                    <td>{{ $vehicle_fuel->total_price }}</td>
                    <td>{{ $vehicle_fuel->location }}</td>
                    <td>
                        <a href="{{ route('vehicle.fuel.edit', $vehicle_fuel) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- <div class="row col-10 text-end">
                {{ $vehicle_fuels->links() }}
            </div> --}}
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
