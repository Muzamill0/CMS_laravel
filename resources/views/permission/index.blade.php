@extends('layout.main')

@section('title', 'Roles')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Permissions</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('permission.create') }}" class="btn btn-outline-primary">Add Permission</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($permissions) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Role Name</th>
                    <th>Action</th>
                </tr>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a href="{{ route('permission.edit', $permission) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $permissions->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
