@extends('layouts.app')

@section('content')
  <div class="container m-3">
    @if (session('deleted'))
      <div class="alert alert-danger">
        {{ session('deleted') }}
      </div>
    @endif

    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Title</th>
          <th scope="col">Date</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($projects as $project)
          <tr>
            <td>{{ $project->id }}</td>
            <td>{{ $project->title }}</td>
            <td>{{ $project->date }}</td>
            <td>
              <a class="btn btn-primary" href="{{ route('admin.projects.show', $project) }}">View</a>
              <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
              <form class="d-inline" action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <div class="ds-link">
      {{ $projects->links() }}
    </div>
  </div>
@endsection
