@extends('layout.main')

@section('title', 'Projects')

@section('content')

<div class="card">
    <div class="card-header">
        <div class="row col-12">
            <div class="col-6">
                <h4>Projects</h4>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('project.create') }}" class="btn btn-outline-primary">Add Project</a>
            </div>
        </div>
        <div class="card-body">
            @if (count($projects) > 0)
            <table class="table">
                <tr>
                    <th>S no</th>
                    <th>Project Title</th>
                    <th>City</th>
                    <th>Action</th>
                </tr>
                @foreach ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->city }}</td>
                    <td>
                        <a href="{{ route('project.edit', $project) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </table>
            <div class="row col-10 text-end">
                {{ $projects->links() }}
            </div>
            @else
            <p class="text-muted">No Data Found</p>
            @endif
        </div>
    </div>
</div>

@endsection
