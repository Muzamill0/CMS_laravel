@extends('layout.main')

@section('title', 'Purchase')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row col-12">
                <div class="col-6">
                    <h4>Purchase Order Edit</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('purchases') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form class="container" action="{{ route('purchase.edit', $purchase) }}" method="POST">
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
                                            @if (old('supplier')) {{ old('supplier') == $supplier->id ? 'selected' : '' }} @else {{ $supplier->id == $purchase->supplier_id ? 'selected' : '' }} @endif>
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
                                            @if (old('project')) {{ old('project') == $project->id ? 'selected' : '' }} @else {{ $project->id == $purchase->project_id ? 'selected' : '' }} @endif>
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
                                            @if (old('vehicle')) {{ old('vehicle') == $vehicle->id ? 'selected' : '' }} @else {{ $vehicle->id == $purchase->vehicle_id ? 'selected' : '' }} @endif>
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
                        <div class=" mb-4 col-md-4">
                            <label for="name-input" class="col-form-label">Product Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name-input" value="{{ old('name') ? old('name') : $purchase->product_name }}" placeholder="Enter Full Name">
                                @error('name')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="quantity-input" class="col-form-label">Quantity</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                                    id="quantity-input" value="{{ old('quantity') ? old('quantity') : $purchase->quantity }}" placeholder="Enter quantity">
                                @error('quantity')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="price_per_unit-input" class="col-form-label">Price Per Unit</label>
                            <div class="col-sm-12">
                                <input type="number" name="price_per_unit" value="{{ old('price_per_unit') ? old('price_per_unit') : $purchase->price_per_unit }}"
                                    class="form-control @error('price_per_unit') is-invalid @enderror"
                                    id="price_per_unit-input" onchange="getTotalPrice()" placeholder="Enter price per unit">
                                @error('price_per_unit')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-6">
                            <label for="total_cost-input"class="col-form-label">Total Cost</label>
                            <div class="col-sm-12">
                                <input type="number" name="total_cost" class="form-control @error('total_cost') is-invalid @enderror"
                                    id="total_cost-input" placeholder="Total Cost" disabled>
                            </div>
                        </div>
                        <div class="mb-4 col-md-6">
                            <label for="date-input" class="col-form-label">Date</label>
                            <div class="col-sm-12">
                                <input type="date" name="date" value="{{ old('date') ? old('date') : $purchase->date }}"
                                    class="form-control @error('date') is-invalid @enderror" id="date-input"
                                    placeholder="Enter date">
                                @error('date')
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
