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
                <div class=" row mb-4">
                    <label for="number-input" class="col-sm-3 col-form-label">Vehicle Number</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('number') is-invalid @enderror"" name="number"
                            id="number-input" value="{{ old('number') }}" placeholder="Enter vehicle number">
                        @error('number')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class=" row mb-4">
                    <label for="driver_name-input" class="col-sm-3 col-form-label">Driver Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('driver_name') is-invalid @enderror"" name="driver_name"
                            id="driver_name-input" value="{{ old('driver_name') }}" placeholder="Enter driver name">
                        @error('driver_name')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <label for="status-input" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9 row">
                        <div class="col-md-3">
                            <label class="form-check-label" for="exampleRadios1">Available</label>
                            <input type="radio" name="status" checked
                                class="form-check-inpu @error('status') is-invalid @enderror" value="1"
                                placeholder="Enter status">
                        </div>
                        <div class="col-md-3">
                            <label class="form-check-label" for="exampleRadios1">Not Available</label>
                            <input type="radio" name="status"
                                class="form-check-inpu @error('status') is-invalid @enderror" value="0"
                                placeholder="Enter status">
                        </div>
                        @error('status')
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
