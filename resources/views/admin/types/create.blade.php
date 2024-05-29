@extends('layouts.admin')

@section('content')
  <div class="container py-5">

    <div class="mb-3">
      <div class="d-flex align-items-center justify-content-between">

        <h3>Adding new project type</h3>

        <a class="custom_btn btn_primary" href="{{ route('admin.types.index') }}">
          <i class="fa-solid fa-angle-left fa-sm"></i>
          Back to types
        </a>

      </div>
    </div>

    @include('partials.validation-errors')

    <form action="{{ route('admin.types.store') }}" method="post">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
          aria-describedby="nameHelper" placeholder="Library" value="{{ old('name') }}" />
        <small id="nameHelper" class="form-text text-muted">Type a name for this type</small>

        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror

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
