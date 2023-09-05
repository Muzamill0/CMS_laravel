@extends('layout.main')

@section('title', 'Edit | Designations')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Edit Designation</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('designations') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('designation.edit', $designation) }}" method="POST">
                @csrf
                <div class=" row mb-4">
                    <label for="name-input" class="col-sm-3 col-form-label">Designation Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                            id="name-input" value="{{ old('name') ? old('name') : $designation->name }}" placeholder="Enter Full name">
                        @error('name')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class= "row">
                    <div class="col-md-3">
                        <label for="status-input" class="col-form-label">Status</label>
                    </div>
                    <div class="col-md-9 row">
                        <div class="col-md-4">
                            <label class="form-check-label" for="exampleRadios1">Active</label>
                            <input type="radio" name="status" checked
                                class="form-check-inpu @error('status') is-invalid @enderror" value="1"
                                placeholder="Enter status">
                        </div>
                        <div class="col-md-4">
                            <label class="form-check-label" for="exampleRadios1">Inactive</label>
                            <input type="radio" name="status" {{ old('status') == $designation->status ? 'checked' : $designation->status }}
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
