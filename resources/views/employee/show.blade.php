@extends('layout.main')

@section('title', 'Employee Profile')

@section('content')

    <main>
        <div class="card mt-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <h3 class="">Employee Profile</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ route('employee.show', $employee) }}" class="btn btn-outline-primary">Back</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                @include('partials.alert')
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="{{ asset('images/' . $employee->image) }}" alt="avatar"
                                    class="rounded-circle img-fluid" style="width: 150px; height: 150px">
                                <h5 class="my-3">{{ $employee->user->name }}</h5>
                                @if ($employee->user->status == 1)
                                    <span class="text-white badge bg-success mb-3">Active</span>
                                @else
                                    <p class="text-white badge bg-danger  mb-3">Inactive</p>
                                @endif
                                <p class="text-muted mb-">{{ $employee->qualification }}</p>
                                <div class="d-flex justify-content-center mb-2">
                                    <a href="{{ route('employee.edit', $employee) }}" class="btn btn-primary">Edit
                                        Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date of birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->dob }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Qualification</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->qualification }}</p>
                                    </div>
                                </div>
                                <hr>
                                {{-- <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Occupation</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $student->occupation }}</p>
                                    </div>
                                </div> --}}
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->gender }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Contact No</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->contact_no }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">CNIC</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->cnic }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Address</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $employee->user->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>

@endsection
