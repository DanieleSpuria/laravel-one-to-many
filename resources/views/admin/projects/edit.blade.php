@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <h2 class="my-4">New project</h2>

    @if ($errors->any())
      <div class="alert alert-danger" role="alert">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Enter title..." value="{{ old('title', $project->title) }}">
        @error('title')
          <div class="text-danger">{{ $message }}</div>
			  @enderror
      </div>

      <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', $project->date) }}">
        @error('date')
          <div class="text-danger">{{ $message }}</div>
			  @enderror
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" class="form-control" id="image" name="image" onchange="showImage(event)">
        <img width="500" id="prev-image" src="" class="my-4">
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10" placeholder="Write a description of your project...">{{ old('description', $project->description) }}</textarea>
        @error('description')
          <div class="text-danger">{{ $message }}</div>
			  @enderror
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script>
    ClassicEditor
      .create( document.querySelector( '#descriprion' ) )
      .catch( error => {
          console.error( error );
      } );

    function showImage(event) {
      const tagImage = document.getElementById('prev-image');
      tagImage.src = URL.createObjectURL(event.target.files[0]);
    }
  </script>

@endsection
