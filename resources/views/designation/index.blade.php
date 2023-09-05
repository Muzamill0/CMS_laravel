@extends('layout.main')

@section('title', 'Designations')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Designations</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('designation.create') }}" class="btn btn-outline-primary">Add Designation</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($designations) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>designation Name</th>
                    <th>designation Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($designations as $designation)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $designation->name }}</td>
                    @if ($designation->status == 1)
                    <td class="badge bg-secondary mt-2">Active</td>
                    @else
                    <td class="badge bg-danger mt-2">Inactive</td>
                    @endif
                    <td >
                        <a href="{{ route('designation.edit', $designation) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $designations->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
