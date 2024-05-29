@extends('layouts.admin')

@section('content')
  <div class="container py-5">

    <div class="mb-3">
      <div class="d-flex align-items-center justify-content-between">

        <h3>Editing type: {{ $type->name }}</h3>

        <a class="custom_btn btn_primary" href="{{ route('admin.types.index') }}">
          <i class="fa-solid fa-angle-left fa-sm"></i>
          Back to types
        </a>

      </div>
    </div>

    @include('partials.validation-errors')
    @include('partials.action-confirmation')

    <form action="{{ route('admin.types.update', $type) }}" method="post">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
          aria-describedby="nameHelper" placeholder="Library" value="{{ old('name', $type->name) }}" />
        <small id="nameHelper" class="form-text text-muted">Edit the name of this type</small>

        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
          rows="5">{{ old('description', $type->description) }}
        </textarea>
        <small id="descriptionHelper" class="form-text text-muted">Edit the description of this type</small>

        @error('description')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <button type="submit" class="custom_btn btn_primary border-0">
        <i class="fa-regular fa-floppy-disk fa-sm"></i>
        Save
      </button>

    </form>
  </div>
@endsection
