@extends('layout.main')

@section('title', 'Suppliers')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4 class="text-muted">Suppliers</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('supplier.create') }}" class="btn btn-outline-primary">Add Supplier</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($suppliers) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Name</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Phone No</th>
                    <th>Address</th>
                    <th>NTN No</th>
                    <th>STRN No</th>
                    <th>Fax No</th>
                    <th>Stauts</th>
                    <th>Action</th>
                </tr>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->contact_person }}</td>
                    <td>{{ $supplier->email }}</td>
                    <td>{{ $supplier->mobile_no }}</td>
                    <td>{{ $supplier->phone_no }}</td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->ntn_no }}</td>
                    <td>{{ $supplier->strn_no }}</td>
                    <td>{{ $supplier->fax_no }}</td>
                    @if ($supplier->status == 1)
                    <td class="badge badge-soft-success  mt-2">Active</td>
                    @else
                    <td class="badge badge-soft-danger mt-2">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('supplier.edit', $supplier) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $suppliers->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>





@endsection
