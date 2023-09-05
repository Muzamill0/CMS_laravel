@extends('layout.main')

@section('title', 'Customers')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4 class="text-muted">Customers</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('customer.create') }}" class="btn btn-outline-primary">Add Customer</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($customers) > 0)
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
                @foreach ($customers as $customer)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->contact_person }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->mobile_no }}</td>
                    <td>{{ $customer->phone_no }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->ntn_no }}</td>
                    <td>{{ $customer->strn_no }}</td>
                    <td>{{ $customer->fax_no }}</td>
                    @if ($customer->status == 1)
                    <td class="badge badge-soft-success  mt-2">Active</td>
                    @else
                    <td class="badge badge-soft-danger mt-2">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('customer.edit', $customer) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $customers->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>





@endsection
