@extends('layout.main')

@section('title', 'Create | Vehicle')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Create Cahicle</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('vehicles') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('vehicle.create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col-md-3">
                        <label for="type-input" class="col-form-label">Vehicle Type</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('type') is-invalid @enderror" name="type"
                                id="type-input" value="{{ old('type') }}" placeholder="Enter vehicle type">
                            @error('type')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="vehicle_no-input" class="col-form-label">Vehicle No</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('vehicle_no') is-invalid @enderror" name="vehicle_no"
                                id="vehicle_no-input" value="{{ old('vehicle_no') }}" placeholder="Enter vehicle no">
                            @error('vehicle_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="model_no-input" class="col-form-label">Driver Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('driver_name') is-invalid @enderror" name="driver_name"
                                id="driver_name-input" value="{{ old('driver_name') }}" placeholder="Enter driver name">
                            @error('driver_name')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="brand_name-input" class="col-form-label">Brand Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('brand_name') is-invalid @enderror" name="brand_name"
                                id="brand_name-input" value="{{ old('brand_name') }}" placeholder="Enter brand name">
                            @error('brand_name')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-3">
                        <label for="chases_no-input" class="col-form-label">Chases No</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('chases_no') is-invalid @enderror" name="chases_no"
                                id="chases_no-input" value="{{ old('chases_no') }}" placeholder="Enter vehicle chases_no">
                            @error('chases_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="engine_no-input" class="col-form-label">Engine No</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('engine_no') is-invalid @enderror" name="engine_no"
                                id="engine_no-input" value="{{ old('engine_no') }}" placeholder="Enter engine no">
                            @error('engine_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="model_no-input" class="col-form-label">Model No</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('model_no') is-invalid @enderror" name="model_no"
                                id="model_no-input" value="{{ old('model_no') }}" placeholder="Enter model no">
                            @error('model_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="reg_date-input" class="col-form-label">Reg Date</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control @error('reg_date') is-invalid @enderror" name="reg_date"
                                id="reg_date-input" value="{{ old('reg_date') }}" placeholder="Enter reg date">
                            @error('reg_date')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-3">
                        <label for="reg_authority-input" class="col-form-label">Reg Authority</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('reg_authority') is-invalid @enderror" name="reg_authority"
                                id="reg_authority-input" value="{{ old('reg_authority') }}" placeholder="Enter reg authority">
                            @error('reg_authority')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div><div class="mb-4 col-md-3">
                        <label for="engine_capacity-input" class="col-form-label">Engine Capacity</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('engine_capacity') is-invalid @enderror" name="engine_capacity"
                                id="engine_capacity-input" value="{{ old('engine_capacity') }}" placeholder="Enter engine capacity">
                            @error('engine_capacity')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="vehicle_value-input" class="col-form-label">Vehicle value</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('vehicle_value') is-invalid @enderror" name="vehicle_value"
                                id="vehicle_value-input" value="{{ old('vehicle_value') }}" placeholder="Enter vehicle value">
                            @error('vehicle_value')
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
