@extends('layouts.admin')

@section('content')
  <header class="py-3 bg_dark text-white">
    <div class="custom_container d-flex align-items-center justify-content-between">

      <h1>{{ $technology->name }}</h1>

      <a class="custom_btn btn_primary" href="{{ route('admin.technologies.index') }}">
        <i class="fa-solid fa-angle-left fa-sm"></i>
        Back to technologies
      </a>

    </div>
  </header>

  <div class="custom_container py-5">
    <div class="row">
      <div class="col-3">
        <div class="card">

          <div class="card-header">
            <h3 class="card-title">
              {{ $technology->name }}
            </h3>
          </div>

          <div class="card-body">

            <div class="mb-3">
              <strong>Preview: </strong>
              <span class="tag {{ $technology->slug }}">{{ $technology->name }} </span>
            </div>

          </div>

        </div>
      </div>
    </div>

  </div>
@endsection
