@extends('layout.main')

@section('title', 'Purchases')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Purchase Orders</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('purchase.create') }}" class="btn btn-outline-primary">Add Purchase</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($purchases) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Supplier</th>
                    <th>Vehicle</th>
                    <th>Project</th>
                    <th>Quantity</th>
                    <th>Price Per Unit</th>
                    <th>Total Cost</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                @foreach ($purchases as $purchase)
                {{-- @dd($purchase) --}}
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $purchase->supplier->name }}</td>
                    <td>{{ $purchase->vehicle->number }}</td>
                    <td>{{ $purchase->project->title }}</td>
                    <td>{{ $purchase->quantity }}</td>
                    <td>{{ $purchase->price_per_unit }} Rs</td>
                    <td>{{ $purchase->total_cost }} Rs</td>
                    <td>{{ $purchase->date }}</td>
                    <td>
                        <a href="{{ route('purchase.edit', $purchase) }}" class="btn btn-primary">Edit</a>
                        <a href="" class="btn btn-outline-success">Create Builty</a>
                    </td>
                </tr>
                @endforeach
            </table>
            {{-- <div class="row col-10 text-end">
                {{ $purchases->links() }}
            </div> --}}
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>





@endsection
