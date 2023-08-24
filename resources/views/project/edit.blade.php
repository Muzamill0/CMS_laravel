@extends('layout.main')

@section('title', 'Edit | Projects')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Edit Permission</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('projects') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('project.edit', $project) }}" method="POST">
                @csrf
                <div class=" row mb-4">
                    <label for="title-input" class="col-sm-3 col-form-label">project title</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('title') is-invalid @enderror"" name="title"
                            id="title-input" value="{{ old('title') ? old('title') : $project->title }}" placeholder="Enter Full title">
                        @error('title')
                            <p class="text-muted">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class=" row mb-4">
                    <label for="city-input" class="col-sm-3 col-form-label">Project City</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('city') is-invalid @enderror"" name="city"
                            id="city-input" value="{{ old('city') ? old('city') : $project->city }}" placeholder="Enter Full city">
                        @error('city')
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
