@extends('layouts.admin')

@section('content')
  <header class="py-3 bg_dark text-white">
    <div class="custom_container d-flex align-items-center justify-content-between">

      <h1>Adding new technology</h1>

      <a class="custom_btn btn_primary" href="{{ route('admin.technologies.index') }}">
        <i class="fa-solid fa-angle-left fa-sm"></i>
        Back to technologies
      </a>

    </div>
  </header>

  <div class="container py-5">

    @include('partials.validation-errors')

    <form action="{{ route('admin.technologies.store') }}" method="post">
      @csrf

      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
          aria-describedby="nameHelper" placeholder="Python" value="{{ old('name') }}" />
        <small id="nameHelper" class="form-text text-muted">Type a name for this technology</small>

        @error('name')
          <div class="text-danger">{{ $message }}</div>
        @enderror

      </div>

      <button type="submit" class="custom_btn btn_primary border-0">
        Create
      </button>

    </form>
  </div>
@endsection
