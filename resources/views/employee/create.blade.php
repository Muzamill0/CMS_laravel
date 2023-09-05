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
                    <a href="{{ route('employees') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form class="container" action="{{ route('employee.create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class=" mb-4 col-md-4">
                            <label for="name-input" class="col-form-label">Full Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror""
                                    name="name" id="name-input" value="{{ old('name') }}"
                                    placeholder="Enter Full Name">
                                @error('name')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label class="col-form-label">Select Supplier</label>
                            <div class="col-sm-12">
                                <select name="designation" id="designation"
                                    class="form-select @error('designation') is-invalid @enderror">
                                    <option value="" selected hidden disabled>Select a designation</option>
                                    @foreach ($designations as $designation)
                                        <option value="{{ $designation->id }}"
                                            {{ old('designation') == $designation->id ? 'selected' : '' }}>
                                            {{ $designation->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('designation')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="email-input" class="col-form-label">E-mail</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror""
                                    name="email" id="email-input" value="{{ old('email') }}" placeholder="Enter E-mail">
                                @error('email')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-md-4">
                                <label for="password-input" class="col-form-label">Password</label>
                                <div class="col-sm-12">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror""
                                        value="{{ old('password') }}" id="password-input" placeholder="Enter Password">
                                    @error('password')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="contact_no-input" class="col-form-label">Contact_no</label>
                                <div class="col-sm-12">
                                    <input type="number" name="contact_no"
                                        class="form-control @error('contact_no') is-invalid @enderror""
                                        value="{{ old('contact_no') }}" id="contact_no-input"
                                        placeholder="Enter contact_no">
                                    @error('contact_no')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="cnic-input" class="col-form-label">Cnic</label>
                                <div class="col-sm-12">
                                    <input type="number" name="cnic"
                                        class="form-control @error('cnic') is-invalid @enderror" id="cnic-input"
                                        value="{{ old('cnic') }}" placeholder="Enter cnic">
                                    @error('cnic')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-4 col-md-4">
                                <label for="father_name-input" class="col-form-label">Father Name</label>
                                <div class="col-sm-12">
                                    <input type="text" name="father_name"
                                        class="form-control @error('father_name') is-invalid @enderror""
                                        value="{{ old('father_name') }}" id="father_name-input"
                                        placeholder="Enter father_name">
                                    @error('father_name')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="dob-input" class="col-form-label">Date of Birth</label>
                                <div class="col-sm-12">
                                    <input type="date" name="dob" value="{{ old('dob') }}"
                                        class="form-control @error('dob') is-invalid @enderror" id="dob-input"
                                        placeholder="Enter dob">
                                    @error('dob')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="joining_date-input" class="col-form-label">Joining Date</label>
                                <div class="col-sm-12">
                                    <input type="date" name="joining_date" value="{{ old('joining_date') }}"
                                        class="form-control @error('joining_date') is-invalid @enderror"
                                        id="joining_date-input" placeholder="Enter joining_date">
                                    @error('joining_date')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <label for="qualification-input" class="col-form-label">Qualification</label>
                                <div class="col-sm-12">
                                    <input type="text"
                                        class="form-control @error('qualification') is-invalid @enderror"
                                        name="qualification" id="qualification-input" value="{{ old('qualification') }}"
                                        placeholder="Enter Full qualification">
                                    @error('qualification')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="image-input" class="col-form-label">Picture</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control @error('image') is-invalid @enderror""
                                        name="image" id="image-input" value="{{ old('image') }}"
                                        placeholder="Enter E-mail">
                                    @error('image')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="salary-input" class="col-form-label">Salary</label>
                                <div class="col-sm-12">
                                    <input type="salary" name="salary"
                                        class="form-control @error('salary') is-invalid @enderror""
                                        value="{{ old('salary') }}" id="salary-input" placeholder="Enter salary">
                                    @error('salary')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row" style="background: rgb(238, 234, 234)">
                            <div class="mb-4 col-md-6">
                                <label for="gender-input" class="col-form-label">Gender</label>
                                <div class="col-sm-12 row">
                                    <div class="col-md-3">
                                        <label class="form-check-label" for="exampleRadios1">Male </label>
                                        <input type="radio" name="gender" checked
                                            class="form-check-inpu @error('gender') is-invalid @enderror" value="Male"
                                            placeholder="Enter gender">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label" for="exampleRadios1">Female</label>
                                        <input type="radio" name="gender"
                                            class="form-check-inpu @error('gender') is-invalid @enderror" value="Female"
                                            placeholder="Enter gender">
                                    </div>
                                    @error('gender')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="relationship_status-input" class="col-form-label">Relationship Status</label>
                                <div class="col-sm-12 row">
                                    <div class="col-md-3">
                                        <label class="form-check-label" for="exampleRadios1">Single</label>
                                        <input type="radio" name="relationship_status" checked
                                            class="form-check-inpu @error('relationship_status') is-invalid @enderror"
                                            value="Single" placeholder="Enter relationship_status">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-check-label" for="exampleRadios1">Married</label>
                                        <input type="radio" name="relationship_status"
                                            class="form-check-inpu @error('relationship_status') is-invalid @enderror"
                                            value="Female" placeholder="Enter relationship_status">
                                    </div>
                                    @error('relationship_status')
                                        <p class="text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>





@endsection
