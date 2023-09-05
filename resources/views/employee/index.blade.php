@extends('layout.main')

@section('title', 'Employees')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Employees</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('employee.create') }}" class="btn btn-outline-primary">Add Employee</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($employees) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Contact No</th>
                    <th>CNIC</th>
                    <th>Designation</th>
                    <th>Date of birth</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @foreach ($employees as $employee)
                {{-- @dd($employee->roles) --}}
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $employee->user->name }}</td>
                    <td>{{ $employee->user->email }}</td>
                    @foreach ($employee->user->roles as $role)
                        <td>{{ $role->name }}</td>
                    @endforeach
                    <td>{{ $employee->user->contact_no }}</td>
                    <td>{{ $employee->user->cnic }}</td>
                    <td>{{ $employee->designation->name }}</td>
                    <td>{{ $employee->user->dob }}</td>
                    @if ($employee->user->status == 1)
                    <td class="bg-success badge mt-2">Active</td>
                    @else
                    <td class="bg-danger badge mt-2">Inactive</td>
                    @endif
                    <td>
                        <a href="{{ route('employee.show', $employee) }}" class="btn btn-primary">Profile</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $employees->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>





@endsection
