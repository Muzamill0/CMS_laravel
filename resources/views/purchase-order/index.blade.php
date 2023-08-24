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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact No</th>
                    <th>CNIC</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($purchases as $purchase)
                {{-- @dd($purchase->roles) --}}
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $purchase->name }}</td>
                    <td>{{ $purchase->email }}</td>
                    <td>{{ $purchase->contact_no }}</td>
                    <td>{{ $purchase->cnic }}</td>
                    <td>{{ $purchase->gender }}</td>
                    <td>{{ $purchase->dob }}</td>
                    @if ($purchase->status == 1)
                    <td class="bg-success rounded">Active</td>
                    @else
                    <td class="bg-danger">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('purchase.edit', $purchase) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $purchases->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>





@endsection
