@extends('layout.main')

@section('title', 'Roles')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                 <h5>Assign Permissions to {{ $role->name }}</h5>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('roles') }}" class="btn btn-outline-primary">Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('partials.alert')
            <form class="container" action="{{ route('assign.permissions', $role) }}" method="POST">
                @csrf
                <div class="panel panel-default">
                    <h3 class="panel-heading">General Permission</h3>
                    <div class="panel-body mt-3">
                        @foreach($permissions as $per)
                                <div class="col-md-4">
                                    <div style="display:flex; justify-content:space-between">
                                        <label for="per{{ $per->id }}">{{ $per->name }}</label>
                                        <input id="per{{ $per->id }}" class="form-check-input" name="permissions[]" value="{{ $per->id }}" type="checkbox" {{ in_array($per->id, $role_permissions) ? 'checked':'' }}/>
                                    </div>
                                    </div>
                                </div>
                        @endforeach
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
