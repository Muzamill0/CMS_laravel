@extends('layout.main')

@section('title', 'edit | Vehicle Maintenance')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Edit Fuel Info</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicle.maintenance') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('vehicle.maintenance.edit',$maintenance) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label class="col-form-label">Vehicle</label>
                        <div class="col-sm-12">
                            <select name="vehicle_id" id="vehicle" class="form-select @error('vehicle') is-invalid @enderror">
                                <option value="" selected hidden disabled>Select a vehicle</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}"
                                        @if (old('vehicle_id')) {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }} @else {{ $maintenance->vehicle_id == $vehicle->id ? 'selected' : '' }} @endif>
                                        {{ $vehicle->vehicle_no }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vehicle')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="date-input" class="col-form-label">Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control @error('date') is-invalid @enderror"" name="date"
                                id="date-input" value="{{ old('date') ? old('date') : $maintenance->date }}" placeholder="Enter vehicle date">
                            @error('date')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="type-input" class="col-form-label">Maintenance Type</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('type') is-invalid @enderror"" name="type"
                                id="type-input" value="{{ old('type') ? old('type') : $maintenance->type }}" placeholder="Enter maintenance type">
                            @error('type')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label class="col-form-label" for="cost">Total Cost</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('cost') is-invalid @enderror"" name="cost"
                            id="cost-input" value="{{ old('cost') ? old('cost') : $maintenance->cost }}" placeholder="Enter Cost">
                            @error('cost')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label class="col-form-label" for="provider">Service Provider</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('provider') is-invalid @enderror"" name="provider"
                            id="provider-input" value="{{ old('provider') ? old('provider') : $maintenance->provider }}" placeholder="Enter Service Provider">
                            @error('provider')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4  mb-4">
                        <label for="location-input" class="col-sm-3 col-form-label">Location</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('location') is-invalid @enderror"" name="location"
                                id="location-input" value="{{ old('location') ? old('location') : $maintenance->location }}" placeholder="Enter Provider Location">
                            @error('location')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <hr>
                <div class="col-sm-9">
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection
