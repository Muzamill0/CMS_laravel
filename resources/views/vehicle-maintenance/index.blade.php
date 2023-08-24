@extends('layout.main')

@section('title', 'Vehicle Maintenance')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Vehicle Maintenance Records</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicle.maintenance.create') }}" class="btn btn-outline-primary">Add Maintenance Info</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($maintenances) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Vehicle Number</th>
                    <th>Date</th>
                    <th>Maintenance Type</th>
                    <th>Total Cost</th>
                    <th>Service Provider</th>
                    <th>location</th>
                    <th>Action</th>
                </tr>
                @foreach ($maintenances as $maintenance)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $maintenance->vehicle->number }}</td>
                    <td>{{ $maintenance->date }}</td>
                    <td>{{ $maintenance->type }}</td>
                    <td>{{ $maintenance->cost }}</td>
                    <td>{{ $maintenance->provider }}</td>
                    <td>{{ $maintenance->location }}</td>
                    <td>
                        <a href="{{ route('vehicle.maintenance.edit', $maintenance) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $maintenances->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
