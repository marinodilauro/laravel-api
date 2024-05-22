@extends('layouts.admin')

@section('content')
  <header class="py-3 bg-dark text-white">
    <div class="container">
      <h1>Adding new project</h1>
    </div>
  </header>

  <div class="container py-5">

    @include('partials.validation-errors')

    <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
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
        <input type="file" class="form-control @error('thumb') is-invalid @enderror" name="thumb" id="thumb"
          aria-describedby="thumbHelper" placeholder="Choose an image" />
        <small id="thumbHelper" class="form-text text-muted">Insert a thumbnail for this project</small>

        @error('thumb')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="project_link" class="form-label">Project link</label>
        <input type="text" class="form-control @error('project_link') is-invalid @enderror" name="project_link"
          id="project_link" aria-describedby="project_linkHelper" placeholder="https://"
          value="{{ old('project_link') }}" />
        <small id="project_linkHelper" class="form-text text-muted">Insert the link of the project</small>

        @error('project_link')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="repo_link" class="form-label">Repository link</label>
        <input type="text" class="form-control @error('repo_link') is-invalid @enderror" name="repo_link"
          id="repo_link" aria-describedby="repo_linkHelper" placeholder="https://" value="{{ old('repo_link') }}" />
        <small id="repo_linkHelper" class="form-text text-muted">Insert the link of the repository</small>

        @error('repo_link')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="content" class="form-label">Description</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="description" id="description"
          rows="5">{{ old('description') }}</textarea>

        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="buttons_container">

        <button type="submit" class="btn btn-primary">
          Create
        </button>

        <a class="btn btn-primary ms-3" href="{{ route('admin.projects.index') }}" title="Back">
          <i class="fa-solid fa-angle-left fa-sm"></i>
          Back to projects
        </a>

      </div>

    </form>
  </div>
@endsection