@extends('layout.main')

@section('title', 'Users')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row col-12">
                <div class="col-6">
                    <h4>Users</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('users') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form class="container" action="{{ route('user.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-md-4">
                            <label class="col-form-label">Select Supplier</label>
                            <div class="col-sm-12">
                                <select name="supplier" id="supplier"
                                    class="form-select @error('supplier') is-invalid @enderror">
                                    <option value="" selected hidden disabled>Select a supplier</option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"
                                            value="{{ old('supplier') == $supplier->id ? 'selected' : '' }}">
                                            {{ $supplier->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('supplier')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label class="col-form-label">Select Project</label>
                            <div class="col-sm-12">
                                <select name="project" id="project"
                                    class="form-select @error('project') is-invalid @enderror">
                                    <option value="" selected hidden disabled>Select a project</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}"
                                            value="{{ old('project') == $project->id ? 'selected' : '' }}">
                                            {{ $project->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label class="col-form-label">Select Vehicle</label>
                            <div class="col-sm-12">
                                <select name="vehicle" id="vehicle"
                                    class="form-select @error('vehicle') is-invalid @enderror">
                                    <option value="" selected hidden disabled>Select a vehicle</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}"
                                            value="{{ old('vehicle') == $vehicle->id ? 'selected' : '' }}">
                                            {{ $vehicle->number }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('vehicle')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        
                    </div>
                    <div class=" row mb-4">
                        <label for="name-input" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                                id="name-input" value="{{ old('name') }}" placeholder="Enter Full Name">
                            @error('name')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="email-input" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email"
                                id="email-input" value="{{ old('email') }}" placeholder="Enter E-mail">
                            @error('email')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="password-input" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"" value="{{ old('password') }}"
                                id="password-input" placeholder="Enter Password">
                            @error('password')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="contact-input" class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="number" name="contact"
                                class="form-control @error('contact') is-invalid @enderror"" value="{{ old('contact') }}"
                                id="contact-input" placeholder="Enter contact">
                            @error('contact')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="cnic-input" class="col-sm-3 col-form-label">Cnic</label>
                        <div class="col-sm-9">
                            <input type="number" name="cnic" class="form-control @error('cnic') is-invalid @enderror"
                                id="cnic-input" value="{{ old('cnic') }}" placeholder="Enter cnic">
                            @error('cnic')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="dob-input" class="col-sm-3 col-form-label">Date of Birth</label>
                        <div class="col-sm-9">
                            <input type="date" name="dob" value="{{ old('dob') }}"
                                class="form-control @error('dob') is-invalid @enderror" id="dob-input"
                                placeholder="Enter dob">
                            @error('dob')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="gender-input" class="col-sm-3 col-form-label">Gender</label>
                        <div class="col-sm-9 row">
                            <div class="col-md-3">
                                <label class="form-check-label" for="exampleRadios1">Male </label>
                                <input type="radio" name="gender" checked
                                    class="form-check-inpu @error('gender') is-invalid @enderror" value="Male"
                                    placeholder="Enter gender">
                            </div>
                            <div class="col-md-3">
                                <label class="form-check-label" for="exampleRadios1">Female</label>
                                <input type="radio" name="gender"
                                    class="form-check-inpu @error('gender') is-invalid @enderror" value="Female"
                                    placeholder="Enter gender">
                            </div>
                            @error('gender')
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