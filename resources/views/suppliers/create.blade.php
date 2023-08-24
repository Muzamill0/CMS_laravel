@extends('layout.main')

@section('title', 'Suppliers')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row col-12">
                <div class="col-6">
                    <h4>Suppliers</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('suppliers') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form class="container" action="{{ route('supplier.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-md-6">
                            <label for="name-input" class="col-form-label">Full Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror""
                                    name="name" id="name-input" value="{{ old('name') }}"
                                    placeholder="Enter Full Name">
                                @error('name')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="email-input" class="col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror""
                                    name="email" id="email-input" value="{{ old('email') }}" placeholder="Enter E-mail">
                                @error('email')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-6">
                            <label for="phone_no-input" class="col-form-label">Phone No</label>
                            <div class="col-sm-12">
                                <input type="number" name="phone_no"
                                    class="form-control @error('phone_no') is-invalid @enderror"" value="{{ old('phone_no') }}"
                                    id="phone_no-input" placeholder="Enter phone_no">
                                @error('phone_no')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="address-input" class="col-form-label">Address</label>
                            <div class="col-sm-12">
                                <input type="address" name="address" class="form-control @error('address') is-invalid @enderror"" value="{{ old('address') }}"
                                    id="address-input" placeholder="Enter address">
                                @error('address')
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
