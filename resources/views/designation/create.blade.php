@extends('layout.main')

@section('title', 'Create | Designation')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Create Designation</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('designations') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('designation.create') }}" method="POST">
                @csrf
                <div class=" row mb-4">
                    <label for="name-input" class="col-sm-3 col-form-label">Designation Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                            id="name-input" value="{{ old('name') }}" placeholder="Enter Full name">
                        @error('name')
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
