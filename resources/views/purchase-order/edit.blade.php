@extends('layout.main')

@section('title', 'Users')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row col-12">
                <div class="col-6">
                    <h4>Edit User</h4>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('users') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                <form class="container" action="{{ route('user.edit', $user) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-4 col-md-4">
                            <label class="col-form-label">Role</label>
                            <div class="col-sm-12">
                                <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                    <option value="" selected hidden disabled>Select a role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->id }}"
                                            @foreach ($user->roles as $user_role)
                                            @if (old('role')) {{ old('role') == $role->id ? 'selected' : '' }} @else {{ $user_role->id == $role->id ? 'selected' : '' }} @endif>
                                            @endforeach
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class=" mb-4 col-md-4">
                            <label for="name-input" class="col-form-label">Full Name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"" name="name"
                                    id="name-input" value="{{ old('name') ? old('name') : $user->name}}" placeholder="Enter Full Name">
                                @error('name')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="email-input" class="col-form-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"" name="email"
                                    id="email-input" value="{{ old('email') ? old('email') : $user->email }}" placeholder="Enter E-mail">
                                @error('email')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-4 col-md-4">
                            <label for="password-input" class="col-form-label">Password</label>
                            <div class="col-sm-12">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"" id="password-input"
                                    placeholder="Enter Password">
                                @error('password')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="contact-input" class="col-form-label">Contact</label>
                            <div class="col-sm-12">
                                <input type="number" name="contact"
                                    class="form-control @error('contact') is-invalid @enderror"" value="{{ old('contact') ? old('contact') : $user->contact_no }}" id="contact-input"
                                    placeholder="Enter contact">
                                @error('contact')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="cnic-input" class="col-form-label">Cnic</label>
                            <div class="col-sm-12">
                                <input type="number" name="cnic" class="form-control @error('cnic') is-invalid @enderror"
                                    id="cnic-input" value="{{ old('cnic') ? old('cnic') : $user->cnic }}" placeholder="Enter cnic">
                                @error('cnic')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class= "mb-4 col-md-4">
                            <label for="dob-input" class="col-form-label">Date of Birth</label>
                            <div class="col-sm-12">
                                <input type="date" name="dob" value="{{ old('dob') ? old('dob') : $user->dob }}" class="form-control @error('dob') is-invalid @enderror"
                                    id="dob-input" placeholder="Enter dob">
                                @error('dob')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class= "mb-4 col-md-4">
                            <label for="gender-input" class="col-form-label">Gender</label>
                            <div class="col-sm-12 row">
                                <div class="col-md-4 border-1">
                                    <label class="form-check-label" for="exampleRadios1">Male </label>
                                    <input type="radio" name="gender" checked
                                        class="form-check-inpu @error('gender') is-invalid @enderror" value="Male"
                                        placeholder="Enter gender">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-check-label" for="exampleRadios1">Female</label>
                                    <input type="radio" name="gender" {{ old('gender') == $user->gender ? 'checked' : '' }}
                                        class="form-check-inpu @error('gender') is-invalid @enderror" value="Female"
                                        placeholder="Enter gender">
                                </div>
                                @error('gender')
                                    <p class="text-muted">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class= "mb-4 col-md-4">
                            <label for="status-input" class="col-form-label">Status</label>
                            <div class="col-sm-12 row">
                                <div class="col-md-4">
                                    <label class="form-check-label" for="exampleRadios1">Active</label>
                                    <input type="radio" name="status" checked
                                        class="form-check-inpu @error('status') is-invalid @enderror" value="1"
                                        placeholder="Enter status">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-check-label" for="exampleRadios1">Inactive</label>
                                    <input type="radio" name="status" {{ old('status') == $user->status ? 'checked' : '' }}
                                        class="form-check-inpu @error('status') is-invalid @enderror" value="0"
                                        placeholder="Enter status">
                                </div>
                                @error('status')
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
