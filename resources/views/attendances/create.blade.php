@extends('layout.main')

@section('title', 'employee | Attendance')

@section('content')
    <main>
            <div class="card mt-4">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="">Attendance Create</h3>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('attendances') }}" class="btn btn-outline-primary">Back</a>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    @include('partials.alert')
                    @if (count($employees) > 0)
                        <form action="{{ route('attendance.create') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="date">Date</label>
                                <input type="date" name="date" id="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}">
                                @error('date')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $employee->user->name }}</td>
                                        <td>{{ $employee->designation }}</td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="{{ $employee->id }}"
                                                    id="{{ $employee->id }}_present" value="1" checked>
                                                <label class="form-check-label" for="{{ $employee->id }}_present">Present</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input"  type="radio" name="{{ $employee->id }}"
                                                    id="{{ $employee->id }}_absent" value="0">
                                                <label class="form-check-label" for="{{ $employee->id }}_absent">Absent</label>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                            <input type="submit" value="Submit" class="btn btn-primary">
                        </form>
                    @else
                        <div class="alert alert-danger" role="alert">
                            No record found!
                        </div>
                    @endif
                </div>
            </div>
    </main>
@endsection
