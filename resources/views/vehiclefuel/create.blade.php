@extends('layout.main')

@section('title', 'Create | Vehicle')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Create Fuel Info</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicle.fuels') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('vehicle.fuel.create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label class="col-form-label">Vehicle</label>
                        <div class="col-sm-12">
                            <select name="vehicle_id" id="vehicle" class="form-select @error('vehicle') is-invalid @enderror">
                                <option value="" selected hidden disabled>Select a vehicle</option>
                                @foreach ($vehicles as $vehicle)
                                    <option value="{{ $vehicle->id }}" value="{{ old('vehicle') == $vehicle->id ? 'selected' : '' }}">
                                        {{ $vehicle->vehicle_no }}
                                    </option>
                                @endforeach
                            </select>
                            @error('vehicle')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class=" mb-4 col-md-4">
                        <label for="date-input" class="col-form-label">Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control @error('date') is-invalid @enderror" name="date"
                                id="date-input" value="{{ old('date') }}" placeholder="Enter vehicle date">
                            @error('date')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class=" mb-4 col-md-4">
                        <label for="meter_readings-input" class="col-form-label">Meter Readings before Fueling</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('meter_readings') is-invalid @enderror" name="meter_readings"
                                id="meter_readings-input" value="{{ old('meter_readings') }}" placeholder="Enter Reading">
                            @error('meter_readings')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class=" mb-4 col-md-4">
                        <label for="price_per_unit-input" class="col-form-label">Price Per Unit</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('price_per_unit') is-invalid @enderror" name="price_per_unit"
                                id="price_per_unit-input" value="{{ old('price_per_unit') }}" placeholder="Enter Price Per Unit">
                            @error('price_per_unit')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class=" mb-4 col-md-4">
                        <label for="total_fuel-input" class="col-form-label">Total Fuel</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('total_fuel') is-invalid @enderror" name="total_fuel"
                                id="total_fuel-input" value="{{ old('total_fuel') }}" onchange="getFuelPrice()" placeholder="Enter total fuel">
                            @error('total_fuel')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class=" mb-4 col-md-4">
                        <label for="total_price-input" class="col-form-label">Total Price</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('total_price') is-invalid @enderror"
                                id="total_price-input" placeholder="Total Price" disabled>
                        </div>
                    </div>
                </div>
                <div class=" row mb-4">
                    <label for="location-input" class="col-sm-3 col-form-label">Location</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control @error('location') is-invalid @enderror"" name="location"
                            id="location-input" value="{{ old('location') }}" placeholder="Enter pump location">
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

<script>
    function getFuelPrice() {
    const pricePerUnitInput = document.getElementById("price_per_unit-input");
    const totalFuelInput = document.getElementById("total_fuel-input");
    const totalPriceInput = document.getElementById("total_price-input");

    const totalFuelInputValue = totalFuelInput.value;
    const pricePerUnitInputValue = pricePerUnitInput.value;
    const totalPrice = totalFuelInputValue * pricePerUnitInputValue;
    totalPriceInput.value = totalPrice;
}
</script>

@endsection
