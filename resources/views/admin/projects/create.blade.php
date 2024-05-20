@extends('layouts.admin')

@section('content')
  <header class="py-3 bg-dark text-white">
    <div class="container">
      <h1>Adding new project</h1>
    </div>
  </header>

  <div class="container py-5">

    @include('partials.validation-errors')

    <form action="{{ route('admin.projects.store') }}" method="post">
      @csrf

      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
          aria-describedby="titleHelper" placeholder="Food Delivery App" value="{{ old('title') }}" />
        <small id="titleHelper" class="form-text text-muted">Type a title for this project</small>

        @error('title')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="thumb" class="form-label">Thumbnail</label>
        <input type="text" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb"
          aria-describedby="thumbHelper" placeholder="https://" value="{{ old('thumb') }}" />
        <small id="thumbHelper" class="form-text text-muted">Insert a thumbnail for this project</small>

        @error('thumb')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Description</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="5">{{ old('description') }}</textarea>

        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <button type="submit" class="btn btn-primary">
        Create
      </button>


    </form>
  </div>
@endsection
