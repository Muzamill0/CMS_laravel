@extends('layout.main')

@section('title', 'Employee | Attendance')

@section('content')
    <main>
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Attendance</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('attendance.create') }}"
                                class="btn btn-outline-primary">Create Attendance</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @include('partials.alert')
                    <form action="{{ route('attendance.fetch') }}" method="POST">
                        @csrf
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-1 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="date" name="date" class="form-control" id="date">
                            </div>
                            <div class="col-sm-1">
                                <input type="submit" class="btn btn-primary" id="submit" value="Find">
                            </div>
                        </div>
                    </form>
                    <p class="text-danger text-center" id="error"></p>
                    @if (count($attendances) > 0)
                    <table class="table text-center" id="table-bhai">
                        <thead>
                            <tr>
                                <th>S NO</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Attendance</th>
                            </tr>
                        </thead>
                        @foreach ($attendances as $attendance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $attendance->employee->user->name }}</td>
                            <td>{{ $attendance->date }}</td>
                            @if ($attendance->status == 1)
                            <td class="badge bg-success mt-2">Present</td>
                            @else
                            <td class="badge bg-danger mt-2">Absent</td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    <div class="text-end">
                        {{ $attendances->links() }}
                    </div>
                    @else
                    <p class="text-danger">No record found</p>
                    @endif
                </div>
            </div>
    </main>
@endsection
