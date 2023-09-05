@extends('layout.main')

@section('title', 'Vehicles')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Vehicles</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicle.create') }}" class="btn btn-outline-primary">Add Vehicle</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($vehicles) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Vehicle Type</th>
                    <th>Vehicle Number</th>
                    <th>Driver Name</th>
                    <th>Brand Name</th>
                    <th>Chases No</th>
                    <th>Engine No</th>
                    <th>Model No</th>
                    <th>Reg Date</th>
                    <th>Reg Authority</th>
                    <th>Engine Capacity</th>
                    <th>Vehicle Value</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vehicle->type }}</td>
                    <td>{{ $vehicle->vehicle_no }}</td>
                    <td>{{ $vehicle->driver_name }}</td>
                    <td>{{ $vehicle->brand_name }}</td>
                    <td>{{ $vehicle->chases_no }}</td>
                    <td>{{ $vehicle->engine_no }}</td>
                    <td>{{ $vehicle->model_no }}</td>
                    <td>{{ $vehicle->reg_date }}</td>
                    <td>{{ $vehicle->reg_authority }}</td>
                    <td>{{ $vehicle->engine_capacity }}</td>
                    <td>{{ $vehicle->vehicle_value }}</td>
                    @if($vehicle->status == '1')
                    <td class="badge bg-success mt-2">Active</td>
                    @else
                    <td class="badge bg-danger mt-2">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('vehicle.edit', $vehicle) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $vehicles->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
