@extends('layout.main')

@section('title', 'Create | Project')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Create Project</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('projects') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('project.create') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label class="col-form-label">Select Supplier</label>
                        <div class="col-sm-12">
                            <select name="customer" id="customer"
                                class="form-select @error('customer') is-invalid @enderror">
                                <option value="" selected hidden disabled>Select a customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ old('customer') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('customer')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="title-input" class="col-form-label">Project Title</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('title') is-invalid @enderror"" name="title"
                                id="title-input" value="{{ old('title') }}" placeholder="Enter Full title">
                            @error('title')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-4 col-md-6">
                        <label for="area-input" class="col-form-label">Project Area</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('area') is-invalid @enderror"" name="area"
                                id="area-input" value="{{ old('area') }}" placeholder="Enter Full area">
                            @error('area')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="project_code-input" class="col-form-label">Project Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('project_code') is-invalid @enderror"" name="project_code"
                                id="project_code-input" value="{{ old('project_code') }}" placeholder="Enter Full project_code">
                            @error('project_code')
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
