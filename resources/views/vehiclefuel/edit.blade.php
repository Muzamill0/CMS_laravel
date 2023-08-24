@extends('layout.main')

@section('title', 'Edit | Vehicle')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Edit Fuel Info</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicle.fuels') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('vehicle.fuel.edit', $vehicle_fuel) }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label class="col-form-label">Vehicle</label>
                        <div class="col-sm-12">
                            <select name="vehicle_id" id="vehicle" class="form-select @error('vehicle') is-invalid @enderror">
                                <option value="" selected hidden disabled>Select a vehicle</option>
                                @foreach ($vehicles as $vehicle)
                                            <option value="{{ $vehicle->id }}"
                                            @if (old('vehicle_id')) {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }} @else {{ $vehicle_fuel->vehicle_id == $vehicle->id ? 'selected' : '' }} @endif>
                                        {{ $vehicle->number }}
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
                                id="date-input" value="{{ old('date') ? old('date') : $vehicle_fuel->date }}" placeholder="Enter vehicle date">
                            @error('date')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="meter_readings-input" class="col-form-label">Meter Readings before Fueling</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('meter_readings') is-invalid @enderror"" name="meter_readings"
                                id="meter_readings-input" value="{{ old('meter_readings')? old('meter_readings') : $vehicle_fuel->meter_readings }}" placeholder="Enter Reading">
                            @error('meter_readings')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label for="price_per_unit-input" class="col-form-label">Price Per Unit</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('price_per_unit') is-invalid @enderror"" name="price_per_unit"
                                id="price_per_unit-input" value="{{ old('price_per_unit')? old('price_per_unit') : $vehicle_fuel->price_per_unit }}" placeholder="Enter Price Per Unit">
                            @error('price_per_unit')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="total_fuel-input" class="col-form-label">Total Fuel</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('total_fuel') is-invalid @enderror"" name="total_fuel"
                                id="total_fuel-input" value="{{ old('total_fuel')? old('total_fuel') : $vehicle_fuel->total_fuel }}" placeholder="Enter total fuel">
                            @error('total_fuel')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="total_price-input" class="col-form-label">Total Price</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('total_price') is-invalid @enderror"" name="total_price"
                                id="total_price-input" value="{{ old('total_price')? old('total_price') : $vehicle_fuel->total_price }}" placeholder="Enter total price">
                            @error('total_price')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class=" row mb-4">
                    <label for="location-input" class="col-form-label">Location</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('location') is-invalid @enderror"" name="location"
                            id="location-input" value="{{ old('location')? old('location') : $vehicle_fuel->location }}" placeholder="Enter pump location">
                        @error('location')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
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
