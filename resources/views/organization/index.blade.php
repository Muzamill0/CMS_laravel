@extends('layout.main')

@section('title', 'Organizations')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Organizations</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('organization.create') }}" class="btn btn-outline-primary">Add Organization</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($organizations) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Organization</th>
                    <th>Owner Name</th>
                    <th>Email</th>
                    <th>Mobile No</th>
                    <th>Phone no</th>
                    <th>Address</th>
                    <th>Sales Tax No</th>
                    <th>NTN No</th>
                    <th>Tag Line</th>
                    <th>Action</th>
                </tr>
                @foreach ($organizations as $organization)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $organization->name }}</td>
                    <td>{{ $organization->owner_name }}</td>
                    <td>{{ $organization->email }}</td>
                    <td>{{ $organization->mobile_no }}</td>
                    <td>{{ $organization->ph_no }}</td>
                    <td>{{ $organization->address }}</td>
                    <td>{{ $organization->sales_tax_no }}</td>
                    <td>{{ $organization->ntn_no }}</td>
                    <td>{{ $organization->tag_line }}</td>
                    <td>
                        <img src="{{ asset('logos/'. $organization->logo) }}" width="70" alt="Logo">
                    </td>
                    <td>
                        <a href="{{ route('organization.edit', $organization) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $organizations->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
