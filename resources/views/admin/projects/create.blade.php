@extends('layouts.admin')

@section('content')
  <div class="custom_container m-0 p-5">

    <div class="mb-3">
      <div class="d-flex align-items-center justify-content-between">

        <h3>Adding new project</h3>

        <a class="custom_btn btn_primary" href="{{ route('admin.projects.index') }}">
          <i class="fa-solid fa-angle-left fa-sm"></i>
          Back to projects
        </a>

      </div>
    </div>

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

      <div class="form-check">
        <input class="form-check-input" type="checkbox" value="1" name="highlighted" id="highlighted"
          {{ old('is_featured') ? 'checked="checked"' : '' }} />
        <label class="form-check-label" for="highlighted"> Highlighted </label>
      </div>

      <div class="mb-3">
        <label for="type_id" class="form-label">Type</label>
        <select class="form-select" name="type_id" id="type_id">
          <option selected disabled>Select a type for the project</option>

          @foreach ($types as $type)
            <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
              {{ $type->name }}
            </option>
          @endforeach

        </select>
        <small id="type_idHelper" class="form-text text-muted">Select a type for this project</small>

      </div>

      <label for="technologies[]" class="form-label">Technology used</label>
      <div class="mb-3 d-flex gap-3 flex-wrap">

        @foreach ($technologies as $technology)
          <div class="form-check @error('technologies') is-invalid @enderror">

            <input name="technologies[]" class="form-check-input" type="checkbox" value="{{ $technology->id }}"
              id="technology-{{ $technology->id }}"
              {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }} />
            <label class="form-check-label" for="technology-{{ $technology->id }}">
              {{ $technology->name }}
            </label>

          </div>
        @endforeach

        @error('technologies')
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

      <div class="row row-cols-2">

        <div class="col">
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
        </div>

        <div class="col">
          <div class="mb-3">
            <label for="repo_link" class="form-label">Repository link</label>
            <input type="text" class="form-control @error('repo_link') is-invalid @enderror" name="repo_link"
              id="repo_link" aria-describedby="repo_linkHelper" placeholder="https://" value="{{ old('repo_link') }}" />
            <small id="repo_linkHelper" class="form-text text-muted">Insert the link of the repository</small>

            @error('repo_link')
              <div class="text-danger">{{ $message }}</div>
            @enderror

          </div>
        </div>

      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
          rows="5">{{ old('description') }}
        </textarea>
        <small id="descriptionHelper" class="form-text text-muted">Type a description for this type</small>

        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <button type="submit" class="custom_btn btn_primary border-0">
        Create
      </button>

    </form>
  </div>
@endsection
