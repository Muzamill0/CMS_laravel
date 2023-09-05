@extends('layout.main')

@section('title', 'Customers')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row col-12">
                <div class="col-6">
                    <h4>Customers</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('customers') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form class="container" action="{{ route('customer.create') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-md-4">
                            <label for="name-input" class="col-form-label">Company Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror""
                                    name="name" id="name-input" value="{{ old('name') }}"
                                    placeholder="Enter Full Name">
                                @error('name')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="contact_person-input" class="col-form-label">Contact Person</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('contact_person') is-invalid @enderror"
                                    name="contact_person" id="contact_person-input" value="{{ old('contact_person') }}"
                                    placeholder="Enter Full contact_person">
                                @error('contact_person')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="email-input" class="col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email-input" value="{{ old('email') }}" placeholder="Enter E-mail">
                                @error('email')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-4">
                            <label for="mobile_no-input" class="col-form-label">Mobile No</label>
                            <div class="col-sm-12">
                                <input type="number" name="mobile_no"
                                    class="form-control @error('mobile_no') is-invalid @enderror" value="{{ old('mobile_no') }}"
                                    id="mobile_no-input" placeholder="Enter mobile_no">
                                @error('mobile_no')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="phone_no-input" class="col-form-label">Phone No</label>
                            <div class="col-sm-12">
                                <input type="number" name="phone_no"
                                    class="form-control @error('phone_no') is-invalid @enderror" value="{{ old('phone_no') }}"
                                    id="phone_no-input" placeholder="Enter phone_no">
                                @error('phone_no')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="address-input" class="col-form-label">Address</label>
                            <div class="col-sm-12">
                                <input type="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}"
                                    id="address-input" placeholder="Enter address">
                                @error('address')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-4">
                            <label for="ntn_no-input" class="col-form-label">NTN No</label>
                            <div class="col-sm-12">
                                <input type="number" name="ntn_no"
                                    class="form-control @error('ntn_no') is-invalid @enderror" value="{{ old('ntn_no') }}"
                                    id="ntn_no-input" placeholder="Enter ntn_no">
                                @error('ntn_no')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="strn_no-input" class="col-form-label">STRN No</label>
                            <div class="col-sm-12">
                                <input type="number" name="strn_no"
                                    class="form-control @error('strn_no') is-invalid @enderror" value="{{ old('strn_no') }}"
                                    id="strn_no-input" placeholder="Enter strn_no">
                                @error('strn_no')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="fax_no-input" class="col-form-label">fax No</label>
                            <div class="col-sm-12">
                                <input type="number" name="fax_no"
                                    class="form-control @error('fax_no') is-invalid @enderror" value="{{ old('fax_no') }}"
                                    id="fax_no-input" placeholder="Enter fax_no">
                                @error('fax_no')
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
