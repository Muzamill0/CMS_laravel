@extends('layout.main')

@section('title', 'Users')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Users</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('user.create') }}" class="btn btn-outline-primary">Add User</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($users) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Contact No</th>
                    <th>CNIC</th>
                    <th>Gender</th>
                    <th>Date of birth</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($users as $user)
                {{-- @dd($user->roles) --}}
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @foreach ($user->roles as $role )
                    <td>{{ $role->name }}</td>
                    @endforeach
                    <td>{{ $user->contact_no }}</td>
                    <td>{{ $user->cnic }}</td>
                    <td>{{ $user->gender }}</td>
                    <td>{{ $user->dob }}</td>
                    @if ($user->status == 1)
                    <td class="bg-success rounded">Active</td>
                    @else
                    <td class="bg-danger">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('user.edit', $user) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $users->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>





@endsection
