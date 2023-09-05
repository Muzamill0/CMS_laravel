@extends('layout.main')

@section('title', 'Edit | Project')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Edit Project</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('projects') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('project.edit', $project) }}" method="POST">
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
                                        @if (old('customer_id')) {{ old('customer_id') == $customer->id ? 'selected' : '' }} @else {{ $project->customer_id == $customer->id ? 'selected' : '' }} @endif>
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
                                id="title-input" value="{{ old('title') ? old('title') : $project->title}}" placeholder="Enter Full title">
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
                                id="area-input" value="{{ old('area') ? old('area') : $project->area }}" placeholder="Enter Full area">
                            @error('area')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-6">
                        <label for="project_code-input" class="col-form-label">Project Code</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('project_code') is-invalid @enderror"" name="project_code"
                                id="project_code-input" value="{{ old('project_code') ? old('project_code') : $project->project_code }}" placeholder="Enter Full project_code">
                            @error('project_code')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <label for="status-input" class="col-form-label">Status</label>
                    <div class="col-sm-12 row">
                        <div class="col-md-4">
                            <label class="form-check-label" for="exampleRadios1">Acticve</label>
                            <input type="radio" name="status" checked
                                class="form-check-inpu @error('status') is-invalid @enderror" value="1"
                                placeholder="Enter status">
                        </div>
                        <div class="col-md-4">
                            <label class="form-check-label" for="exampleRadios1">Inactive</label>
                            <input type="radio" name="status" {{ old('status') == $project->status ? 'checked' : $project->status }}
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
