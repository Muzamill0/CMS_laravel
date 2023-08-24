@extends('layout.main')

@section('title', 'Organization | Create')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Create Organization</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('organizations') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('organization.create') }}" method="POST">
                @csrf
                <div class=" row mb-4">
                    <label for="name-input" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                            id="name-input" value="{{ old('name') }}" placeholder="Enter Organization name">
                        @error('name')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class=" row mb-4">
                    <label for="location-input" class="col-sm-3 col-form-label">location</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('location') is-invalid @enderror"" name="location"
                            id="location-input" value="{{ old('location') }}" placeholder="Enter location">
                        @error('location')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class=" row mb-4">
                    <label for="ph_no-input" class="col-sm-3 col-form-label">Phone No</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control @error('ph_no') is-invalid @enderror"" name="ph_no"
                            id="ph_no-input" value="{{ old('ph_no') }}" placeholder="Enter phone number">
                        @error('ph_no')
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
