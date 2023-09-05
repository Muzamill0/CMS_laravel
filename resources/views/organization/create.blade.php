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
            <form class="container" action="{{ route('organization.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="mb-4 col-md-3">
                        <label for="name-input" class="col-form-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                                id="name-input" value="{{ old('name') }}" placeholder="Enter Organization name">
                            @error('name')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="owner_name-input" class="col-form-label">Owner Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('owner_name') is-invalid @enderror"" name="owner_name"
                                id="owner_name-input" value="{{ old('owner_name') }}" placeholder="Enter owner_name">
                            @error('owner_name')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="email-input" class="col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('email') is-invalid @enderror"" name="email"
                                id="email-input" value="{{ old('email') }}" placeholder="Enter email">
                            @error('email')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-3">
                        <label for="address-input" class="col-form-label">Address</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('address') is-invalid @enderror"" name="address"
                                id="address-input" value="{{ old('address') }}" placeholder="Enter address">
                            @error('address')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label for="mobile_no-input" class="col-form-label">Mobile No</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('mobile_no') is-invalid @enderror"" name="mobile_no"
                                id="mobile_no-input" value="{{ old('mobile_no') }}" placeholder="Enter phone number">
                            @error('mobile_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="ph_no-input" class="col-form-label">Phone No</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('ph_no') is-invalid @enderror"" name="ph_no"
                                id="ph_no-input" value="{{ old('ph_no') }}" placeholder="Enter phone number">
                            @error('ph_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="logo-input" class="col-form-label">Logo</label>
                        <div class="col-sm-12">
                            <input type="file" class="form-control @error('logo') is-invalid @enderror""
                                name="logo" id="logo-input" value="{{ old('logo') }}"
                                placeholder="Enter E-mail">
                            @error('logo')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="mb-4 col-md-4">
                        <label for="sales_tax_no-input" class="col-form-label">Sales Tax No</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('sales_tax_no') is-invalid @enderror"" name="sales_tax_no"
                                id="sales_tax_no-input" value="{{ old('sales_tax_no') }}" placeholder="Enter sales tax">
                            @error('sales_tax_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="ntn_no-input" class="col-form-label">NTN No</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control @error('ntn_no') is-invalid @enderror"" name="ntn_no"
                                id="ntn_no-input" value="{{ old('ntn_no') }}" placeholder="Enter NTN No">
                            @error('ntn_no')
                                <p class="text-muted">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4 col-md-4">
                        <label for="tag_line-input" class="col-form-label">Tag Line</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control @error('tag_line') is-invalid @enderror""
                                name="tag_line" id="tag_line-input" value="{{ old('tag_line') }}"
                                placeholder="Enter tag line">
                            @error('tag_line')
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
