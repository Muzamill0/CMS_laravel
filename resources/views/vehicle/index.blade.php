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
                    <th>vehicle Number</th>
                    <th>Driver Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($vehicles as $vehicle)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vehicle->number }}</td>
                    <td>{{ $vehicle->driver_name }}</td>
                    @if($vehicle->status == '1')
                    <td>Available</td>
                    @else
                    <td>Not Available</td>
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
