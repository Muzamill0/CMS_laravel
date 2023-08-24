@extends('layout.main')

@section('title', 'Roles')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Roles</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('role.create') }}" class="btn btn-outline-primary">Add Roles</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($roles) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($roles as $role)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a href="{{ route('role.edit', $role) }}" class="btn btn-primary">Edit Role</a>
                        <a href="{{ route('assign.permissions', $role) }}" class="btn btn-secondary">Edit Permissions</a>
                    </td>
                </tr>

                @endforeach

            </table>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
